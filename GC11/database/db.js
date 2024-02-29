import mongoose from "mongoose";
import dotenv from 'dotenv';

dotenv.config();


const Connection = () => {
    const DB_URI = 'mongodb+srv://AyushMaurya:Ayush07@gmail.jrwcthr.mongodb.net/GmailCLoneDB'
        try {
        mongoose.connect(DB_URI, { useNewUrlParser: true, useUnifiedTopology: true });
        mongoose.set('strictQuery', false);
        console.log('Database connected sucessfully');
    } catch (error) {
        console.log('Error while connecting with the database ', error.message)
    }
}

export default Connection;