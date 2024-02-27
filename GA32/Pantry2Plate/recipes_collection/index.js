const mongoose = require('mongoose');


const details = require('./all_recipes.json');
// const {places, descriptors} = require('./helper');
// const {ingredient1, ingredient2, ingredient3} = require('./helper');
// const {ingredient1, ingredient2, ingredient3, ingredient4, ingredient5} = require('./helper');

const Recipe = require('../models/recipe');


mongoose.connect('mongodb://localhost:27017/p2p-recipe')


const db = mongoose.connection;
// db.on("error", console.error.bind(console, "connection error:"));

db.on("connected", () => {
    console.log("Connected to database sucessfully");
});
db.on("error", (err) => {
    console.log("Error while connecting to database :" + err);
});
db.on("disconnected", () => {
    console.log("Mongodb connection disconnected");
});
db.once("open", () => {
    console.log("Database connected!");
});

// const sample = array => array[Math.floor(Math.random() * array.length)];


const recipeDB = async() => {
    await Recipe.deleteMany({});
    for(let i=0; i< 13; i++){
        const reci = new Recipe({
            //Everything is callinng from same file except title
            name: `${details[i].name}`,
            time: `${details[i].time}`,
            img: `${details[i].img}`,
            method: `${details[i].method}`, 
            // title: `${descriptors[i]} - ${places[i]}`,
            // ingredients: `${ingredient1[i]}, ${ingredient2[i]}, ${ingredient3[i]}`,  
            // ingredient1: `${ingredient1[i]}`,
            // ingredient2: `${ingredient2[i]}`,
            // ingredient3: `${ingredient3[i]}`,
            // ingredient4: `${ingredient4[i]}`,
            // ingredient5: `${ingredient5[i]}`,
            ingredient: details[i].ingredient,
            // image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-XkySihon_1vO738aeah1NEASxQ07vLTee1P6cJ_MlVfaokghr5OoJH02Er3-DIa3Nck&usqp=CAU",
            description: `${details[i].description}`
        })
        await reci.save();
    }
    // for(let recipe of details){
    //     const reci = new Recipe({
    //         title: `${recipe.title}`
    //     })
    //     await reci.save();
    // }
}

recipeDB().then(() => {
    mongoose.connection.close();
})