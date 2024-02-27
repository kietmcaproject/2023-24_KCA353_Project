//Install express
const express = require('express');
const path = require('path');
const mongoose = require('mongoose');
// Install ejs-mate
const ejsMate = require('ejs-mate');
// Install express-session
const session = require('express-session');
//Install connect-flash --- success and error comment
const flash = require('connect-flash');
const expressError = require('./utils/expressError');
//Install method-override
const methodOverride = require('method-override');
const recipes = require('./routes/recipes');
const search = require('./routes/search');
const aboutUs = require('./routes/aboutUs');
// Install passport
const passport = require('passport');
// Install passport-local
const localStrategy = require('passport-local');
const User = require('./models/user');
// Searching...
require("dotenv").config();
const cors = require('cors');



// users folder --- for Register form
const aboutUsRoutes = require('./routes/aboutUs');
const searchRoutes = require('./routes/search');
const userRoutes = require('./routes/users');
const recipeRoutes = require('./routes/recipes');



//CONNECT WITH MONGODB
mongoose.connect('mongodb://localhost:27017/p2p-recipe');


//CONNECTION CHECKUP
const db = mongoose.connection;
db.on("error", console.error.bind(console, "connection error:"));
db.once("open", () => {
    console.log("Database connected!");
});


const app = express();

//ejs
app.engine('ejs', ejsMate)
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));


app.use(express.urlencoded({extended: true}));
app.use(methodOverride('_method'));
app.use(express.static(path.join(__dirname, 'public')))
// app.use('/static', express.static(path.join(__dirname, 'public')))
//Searching
app.use(express.json());
app.use(cors());


// express-session
const sessionConfig = {
    secret: 'thisshouldbebettersecret!',
    resave: false,
    saveUninitialized: true,
    cookie: {
        httpOnly: true,
        expires: Date.now() + 1000 * 60 * 60 * 24 * 7,
        maxAge: 1000 * 60 * 60 * 24 * 7
    }
}
app.use(session(sessionConfig))

// connect-flash
app.use(flash());

// passport
app.use(passport.initialize());
app.use(passport.session());
passport.use(new localStrategy(User.authenticate()));

passport.serializeUser(User.serializeUser());
passport.deserializeUser(User.deserializeUser());

app.use((req, res, next) => {
    console.log(req.session)
    res.locals.currentUser = req.user;  //For current user
    res.locals.success = req.flash('success');
    res.locals.error = req.flash('error');
    next();
})

app.use('/', userRoutes);

app.use('/search', search)
app.use("/", searchRoutes);
app.use('/search', searchRoutes);

app.use('/aboutUs', aboutUs)
app.use("/", aboutUsRoutes);
app.use('/aboutUs', aboutUsRoutes);

app.use('/recipes', recipes)
// app.use("/", recipeRoutes);
app.use('/recipes', recipeRoutes);

// app.use('/recipes/:id/reviews', recipeRoutes);


//HOME
app.get('/', (req, res) => {
    res.render('home');
})

//Images
app.use("/images", express.static('images'))

//MORE ERRORS
app.all('*', (req, res, next) => {
    next(new expressError('Page Not Found', 404));
})


//ERROR Handling
app.use((err, req, res, next) => {
    const { statusCode = 500 } = err;
    if(!err.message) err.message = 'Oh no, Somthing went wrong!'
    res.status(statusCode).render('error', { err });
})


//LISTEN
app.listen(4000, () => {
    console.log('Serving on port 4000');
})