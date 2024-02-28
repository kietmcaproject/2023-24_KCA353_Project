import { initializeApp } from "firebase/app";
import {getAuth,GoogleAuthProvider} from "firebase/auth"
import {getFirestore} from "firebase/firestore"

const firebaseConfig = {
  apiKey: "AIzaSyANiTIOwD-7IQbheXBIT5yQi3_VyG0g7iM",
  authDomain: "whatsapp-clone-f3f4e.firebaseapp.com",
  projectId: "whatsapp-clone-f3f4e",
  storageBucket: "whatsapp-clone-f3f4e.appspot.com",
  messagingSenderId: "265946948362",
  appId: "1:265946948362:web:d4e40a4bad3bd9eb8550f3"
};


const app = initializeApp(firebaseConfig);
export const auth = getAuth(app)
export const googleProvider = new GoogleAuthProvider(app)
export const database = getFirestore(app)