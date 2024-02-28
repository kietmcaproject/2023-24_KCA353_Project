import "./App.css";
import Navbar from "./Components/Navbar";
import Login from "./Components/Login";
import Home from "./pages/Home";
import About from "./pages/About";
import Contact from "./pages/Contact";
import Signup from "./Components/Signup";
import Dashboard from "./Components/Search";
import PrivateRoute from "./Components/PrivateRoute";
import { Route, Routes } from "react-router-dom";
import React, { useState } from "react";
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider'

function App() {
  const [isLoggedIn, setIsLoggedIn] = useState(false);
  return (
    <MuiThemeProvider>
    <div className="w-screen h-screen bg-richblack-900 flex flex-col ">
      <Navbar isLoggedIn={isLoggedIn} setIsLoggedIn={setIsLoggedIn} />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/About" element={<About />} />
        <Route path="/Contact" element={<Contact />} />
        <Route
          path="/login"
          element={<Login setIsLoggedIn={setIsLoggedIn} />}
        />
        <Route
          path="/signup"
          element={<Signup setIsLoggedIn={setIsLoggedIn} />}
        />
        
        <Route isLoggedIn={isLoggedIn}>
          <Route path="/dashboard" element={<Dashboard />} />
        </Route>
        
      </Routes>
    </div>
    </MuiThemeProvider>
  );
}

export default App;
