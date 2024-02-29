const { error } = require("console");
const mysql=require("mysql");
const express=require("express");
const bodyParser=require("body-parser");
const encoder=bodyParser.urlencoded();

const app=express();
app.use("/style1.css",express.static("style1.css"));
app.use("/index.html",express.static("index.html"));
app.use("/style.css",express.static("style.css"));
app.use("/login.html",express.static("login.html"));
app.use("/responsive.css",express.static("responsive.css"));
app.use("/app.js",express.static("app.js"));
app.use("/bb.js",express.static("bb.js"));
app.use("/gsap.js",express.static("gsap.js"));
app.use("/script.js",express.static("script.js"));




const connection=mysql.createConnection({
    host:"localhost",
    user:"root",
    password:"pass",
    database:"nodejs"
});

// connect to the database

connection.connect(function(error){
    if(error) throw error
    else console.log("connected to the database succesfully")

});

app.get("/",function(req,res){
    res.sendFile(__dirname + "/login.html");
})

app.post("/",encoder,function(req,res){
    var username=req.body.username;
    var password=req.body.password;

    connection.query("select *from loginuser where user_name=? and user_pass=?",[username,password],function(error,results,feilds){
        if(results.length>0){
            res.redirect("/index.html");
        }else{
            res.redirect("/");
        }
        res.end();
    })
})

// when login is success
app.get("/index",function(req,res){
    res.sendFile(__dirname + "/index.html")
})

//set app port
app.listen(4000);