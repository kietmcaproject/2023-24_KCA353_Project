const Joi = require('joi');

module.exports.recipeSchema = Joi.object({
    recipe: Joi.object({
        name: Joi.string().required(),
        time: Joi.string().required(),
        img: Joi.string().required(),
        method: Joi.string().required(),
        // ingredient: Joi.string().required(),
        ingredient: Joi.string().required(),
        // ingredient1: Joi.string().required(),
        // ingredient2: Joi.string().required(),
        // ingredient3: Joi.string().required(),
        // ingredient4: Joi.string().allow(""),
        // ingredient5: Joi.string().allow(""),
        description: Joi.string().required(),
    }).required()
});