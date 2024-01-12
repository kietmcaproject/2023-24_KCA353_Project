const { ClientSession } = require("mongodb");
const mongoose =require("mongoose");


const DB=process.env.DATABASE;

mongoose.connect(DB).then(()=>console.log("Data base connected")).catch((error)=>console.log("error"+ error.message))