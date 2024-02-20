const mongoose = require("mongoose");
// const mongoURI='mongodb+srv://yourfood:mern987@cluster0.wndax2a.mongodb.net/ourfood?retryWrites=true&w=majority';
const mongoURI =
  "mongodb+srv://yourfood:mern987@cluster0.wndax2a.mongodb.net/ourfood?retryWrites=true&w=majority";
  module.exports = function (callback) {
    mongoose.connect(mongoURI, { useNewUrlParser: true }, async (err, result) => {
        // mongoDbClient.connect(mongoURI, { useNewUrlParser: true }, async(err, result) => {
        if (err) console.log("---" + err)
        else {
            // var database =
            console.log("connected to mongo")
            const foodCollection = await mongoose.connection.db.collection("food-items");
            foodCollection.find({}).toArray(async function (err, data) {
                const categoryCollection = await mongoose.connection.db.collection("food-category");
                categoryCollection.find({}).toArray(async function (err, Catdata) {
                    callback(err, data, Catdata);

                })
            });
            // listCollections({name: 'food_items'}).toArray(function (err, database) {
            // });
            //     module.exports.Collection = database;
            // });
        }
    })
};
// const mongoDB = async () => {
//   await mongoose
//     .connect(mongoURI, { useNewUrlParser: true })
//     .then(() => {
//       console.log("connected successfully!");
//       const fetchd = mongoose.connection.db.collection("food-items");
//       fetchd.find({}).toArray(function(err,data){
//           if(err) console.log(err);
//           else  console.log(data+"fa");
//       })
     
//     })
//     .catch((err) => {
//       console.log("indeed" + err);
//     });
// };

// module.exports = mongoDB;
// new code
// module.exports = function (callback) {
//     mongoose.connect(mongoURI, { useNewUrlParser: true }, async (err, result) => {
//         // mongoDbClient.connect(mongoURI, { useNewUrlParser: true }, async(err, result) => {
//         if (err) console.log("---" + err)
//         else {
//             // var database =
//             console.log("connected to mongo")
//             const foodCollection =  mongoose.connection.db.collection("food-items");
//             foodCollection.find({}).then((data) =>{
//                 const categoryCollection =  mongoose.connection.db.collection("food-Category")}
//                 ).catch((err)=>{});
//                 categoryCollection.find({}).then((Catdata)=> {
//                     callback(err, data, Catdata)}).catch((err)=>{
//                         console.log(err);
//                     });

//             // listCollections({name: 'food_items'}).toArray(function (err, database) {
//             // });
//             //     module.exports.Collection = database;
//             // });
//         }
//     })
// };
