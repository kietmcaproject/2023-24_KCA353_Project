// require("dotenv").config();
// const express = require("express");
// const app = express();
// const mongoose = require("mongoose");
// const port = process.env.PORT || 5007;
// const cookieParser = require("cookie-parser");
// const DefaultData = require("./defaultdata");
// require("./db/conn");
// const router = require("./routes/router");
// const products = require("./models/productsSchema");
// const jwt = require("jsonwebtoken");


// // middleware
// app.use(express.json());
// app.use(cookieParser(""));

// app.use(router);
// // app.get("/",(req,res)=>{
// //     res.send("your server is running");
// // });


// if(process.env.NODE_ENV == "production"){
//     app.use(express.static("client/build"));
// }

// app.listen(port,()=>{
//     console.log(`your server is running on port ${port} `);
// });

// DefaultData();











require("dotenv").config();
const express =require("express");
const app= express();
const mongoose =require("mongoose");
const cookieParser = require("cookie-parser");


require("./db/conn");


const Products = require("./models/productsSchema");


const DefaultData = require("./defaultdata");
const cors = require("cors");
const router = require("./routes/router");


app.use(express.json());
app.use(cookieParser(""));
app.use(cors());
app.use(router);

const port =8005;

app.listen(port,()=>{
    console.log(`server is runnig on port number ${port}`);
});



// DefaultData();