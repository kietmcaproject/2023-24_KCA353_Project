const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const RecipeSchema = new Schema({
    // name: String,
    // time: String,
    // image: String,
    // method: String,
    // // title: String,
    // // ingredient1: String,
    // // ingredient2: String,
    // // ingredient3: String,
    // // ingredient4: String,
    // // ingredient5: String,
    // ingredient: String,
    // description: String

    name: {type: String, required: true},
    time: {type: Number, required: true}, 
    img: {type: String, required: true},
    method: {type: String, required: true}, 
    ingredient: {type: [String], required: true},
    description: {type: String, required: true}, 

});

module.exports = mongoose.model('Recipe', RecipeSchema);