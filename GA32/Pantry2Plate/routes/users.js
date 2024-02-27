const express = require('express');
const router = express.Router();
const passport = require('passport');
const catchAsync = require('../utils/catchAsync');
const User = require('../models/user');


//REGISTER
router.get('/register', (req, res, next) => {
    res.render('users/register');
});

router.post('/register', catchAsync(async (req, res) => {
    try{
        const { email, username, password } = req.body;
        const user = new User({email, username});
        const registeredUser = await User.register(user, password);
        req.login(registeredUser, err => {
            if(err) return next(err);
            req.flash('success', 'Welcome to P2P!');
            res.redirect('/recipes');
        })
    } catch(e){
        req.flash('error', e.message);
        res.redirect('register');
    }
}));


//LOGIN
router.get('/login', (req, res) => {
    res.render('users/login');
})

router.post('/login', passport.authenticate('local', { failureFlash: true, failureRedirect: '/login' }), (req, res) => {
    req.flash('success', 'welcome back');
    //It tekes to redirect to the same page where it left before login
    const redirectUrl = req.session.returnTo || '/recipes';
    delete req.session.returnTo;
    res.redirect(redirectUrl);
});


//LOGOUT
router.get('/logout', (req, res, next) => {
    req.logout(err => {
        if(err){
            return next(err);
        }
        req.flash('success', "Goodbye!");
        res.redirect('/recipes');
    });
});


module.exports = router;