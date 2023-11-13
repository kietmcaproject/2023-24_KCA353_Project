import React from 'react';
import {Link} from 'react-router-dom';

function Navbar(){
  return ( 
    
    <nav className="navbar navbar-expand-sm navbar-light bg-light">
      <div className="container">
        <a className="navbar-brand" href="/">E-Museum</a>
        <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span className="navbar-toggler-icon"></span>
        </button>
        <div className="collapse navbar-collapse" id="navbarNav">
          
          <ul className="navbar-nav ms-auto">
               
            <li className="nav-item">
              <Link to = "\Home" className="nav-link" href="museum-app\src\Components\home.js">Home</Link>
            </li>
           
            <li className="nav-item">
              < Link to = "\Museums " className="nav-link" href="museum-app\src\Components\museum.js">Museums</Link>
            </li>
           
            <li className="nav-item">
              <Link to = "\About " className="nav-link" href="museum-app\src\Components\about.js">About</Link>
            </li>

            <li className="nav-item">
              <Link to = "\Sign-up " className="nav-link" href="museum-app\src\Components\signup.js">Sign-up</Link>
            </li>

            <li className="nav-item">
              <Link to = "\Login " className="nav-link" href="museum-app\src\Components\login.js">Login</Link>
            </li>

          </ul>
      </div>
      </div>
    </nav>
  );
};

export default Navbar;
