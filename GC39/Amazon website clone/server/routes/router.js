const express = require("express");
const router = new express.Router();
const Products = require("../models/productsSchema");
const USER = require("../models/userSchema");
const bcrypt = require("bcryptjs");
const athenticate = require("../middleware/authenticate");

// get productdata api
router.get("/getproducts", async (req, res) => {
    try {
        const productsdata = await Products.find();
            console.log("console the data"+productsdata); 
        res.status(201).json(productsdata);
    } catch (error) {
        console.log("error" + error.message);

    }
});



//get individual data

router.get("/getproductsone/:id", async (req, res) => {
    try {
        const { id } = req.params;
        // console.log(id);

        const individualdata = await Products.findOne({ id: id });
        // console.log(individualdata +"individual data");

        res.status(201).json(individualdata);
    } catch (error) {
        res.status(400).json(individualdata);
        console.log("error" + error.message);
    }
});


// Register data
router.post("/register", async (req, res) => {
    // console.log(req.body);
    const { fname, email, mobile, password, cpassword } = req.body;


    if (!fname || !email || !mobile || !password || !cpassword) {
        res.status(422).json({ error: "filll the all details" });
        console.log("Data not Avaialable");
    };
    try {
        const preuser = await USER.findOne({ email: email });

        if (preuser) {
            res.status(422).json({ error: "This user is already present" });
        } else if (password !== cpassword) {
            res.status(422).json({ error: "Password are not matching" });
        } else {
            const finalUser = new USER({
                fname, email, mobile, password, cpassword
            });


            const storedata = await finalUser.save();
            console.log(storedata);

            res.status(201).json(storedata);
        }
    } catch (error) {

    }
})


//login user API
// router.post("/login",async(req,res)=>{
//     const {email,password} = req.body;

//     if(!email || !password){
//         res.status(400).json({error:"fill the all details"})
//     };

//     try {
//         const userlogin = await USER.findOne({email:email});
//        console.log(userlogin);


//        if(userlogin){
//         const isMatch = await bcrypt.compare(password , userlogin.password);
//         console.log(isMatch);
//        }
//        if(!isMatch){
//         res.status(400).json({error:"Password not Match"});
//        } else{
//         res.status(201).json({message:"password matched"});
//        }
//     } catch (error) {

//          res.status(400).json({error:"Invalid details"})
//     }
// })







// router.post("/login", async (req, res) => {
//     const { email, password } = req.body;
  
//     if (!email || !password) {
//       res.status(400).json({ error: "Fill the all details" });
//     }
  
//     try {
//       const user = await USER.findOne({ email }); //{email:email},userlogin
//       console.log(user);
  
//       if (!user) {
//         res.status(401).json({ error: "Invalid email or password" });
//       }
//        if(userlogin){
//       const isMatch = await bcrypt.compare(password, userlogin.password);
//       console.log(isMatch);

//       //token generate
//       const token = await user.generateAuthtokenn();
//      // console.log(token);

//      res.cookie("Amazonweb",token,{
//         expires:new Date(Date.now()+900000),
//         httpOnly:true
//      })
  
//       if (!isMatch) {
//         res.status(400).json({ error: "Invalid email or password negi" });
//       } else {
//         res.json({ message: "Login successful!" });  
//       }
//     }else{
//         res.status(401).json({ error: "Invalid email or password negi" });
//     }
  
//     } catch (err) {
//       console.error(err);
//       res.status(500).json({ error: "Internal server error" });
//     }
//   });





router.post("/login", async (req, res) => {
    const { email, password } = req.body;

    if (!email || !password) {
        return res.status(400).json({ error: "Fill in all details" });
    }

    try {
        const user = await USER.findOne({ email });

        if (!user) {
            return res.status(401).json({ error: "Invalid email or password" });
        }

        const isMatch = await bcrypt.compare(password, user.password);

        if (!isMatch) {
            return res.status(400).json({ error: "Invalid email or password" });
        }

        // generate token
        const token = await user.generateAuthtokenn();

        res.cookie("Amazonweb", token, {
            expires: new Date(Date.now() + 90000000),
            httpOnly: true
        });

        return res.json({ message: "Login successful!" });
    } catch (err) {
        console.error(err);
        return res.status(500).json({ error: "Internal server error" });
    }
});


// adding the data into cart

router.post("/addcart/:id",athenticate,async(req,res)=>{
    try {
        const {id}=req.params;
        const cart = await Products.findOne({id:id});
        console.log(cart +"cart value");


        const UserContact = await USER.findOne({_id:req.userID});
        console.log(UserContact);


        if(UserContact){
            const cartData= await UserContact.addcartdata(cart);
            await UserContact.save();
            console.log(cartData);
            res.status(201).json(UserContact);
        }
        else{
            res.status(401).json({error:"Invalid User cart"});
        }
    } catch (error) {
        res.status(401).json({error:"Invalid User cart"});
    }
});




//get cart details
router.get("/cartdetails", athenticate, async (req, res) => {
    try {
        const buyuser = await USER.findOne({ _id: req.userID });
        // console.log(buyuser + "user buy par hain");
        res.status(201).json(buyuser);
    } catch (error) {
        console.log(error + "error for buy now");
    }
});


// get valid user

router.get("/validuser", athenticate, async (req, res) => {
    try {
        const validuserone = await USER.findOne({ _id: req.userID });
        // console.log(buyuser + "user buy par hain");
        res.status(201).json(validuserone);
    } catch (error) {
        console.log(error + "error");
    }
});



//remove item from cart
router.delete("/remove/:id",athenticate,async(req,res)=>{
    try {
         const{id} =req.params;

         req.rootUser.carts = req.rootUser.carts.filter((cruval)=>{
            return cruval.id != id;
         });
         req.rootUser.save();
         res.status(201).json(req.rootUser);
         console.log("item remove");
    } catch (error) {
        console.log("error"+"error");
        res.status(400).json(req.rootUser); 
    }
})
 


/// for use logout
router.get("/logout",athenticate,(req,res)=>{
    try {
        req.rootUser.tokens = req.rootUser.tokens.filter((curelem)=>{
            return curelem.token !== req.token
        });


        res.clearCookie("Amazonweb",{path:"/"});
        req.rootUser.save();
        res.status(201).json(req.rootUser.tokens);
        console.log("user logout");
    } catch (error) {
        console.log("Error"+"Error ha logout ma");
    }
})








module.exports = router;