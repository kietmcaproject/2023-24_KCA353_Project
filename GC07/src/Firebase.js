import firebase from "firebase/compat/app";
import "firebase/compat/auth";
import "firebase/compat/firestore";

// eslint-disable-next-line no-unused-vars
const firebaseApp = firebase.initializeApp({
  apiKey: "AIzaSyBGmMLPXCZlcgq6zngOptylBFvnKpsRVec",
  authDomain: "login-page-1449d.firebaseapp.com",
  projectId: "login-page-1449d",
  storageBucket: "login-page-1449d.appspot.com",
  appId: "1:1089740138973:web:9283ec0cae26f6099d2e34"
});

const auth = firebase.auth();

export { auth };
