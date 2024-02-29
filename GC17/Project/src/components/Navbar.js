
import React, { Component } from "react";
import "./NavbarStyles.css";
import { MenuItems } from "./MenuItems";
import { Link } from "react-router-dom";
import { Navigate } from "react-router-dom";

class Navbar extends Component {
  state = { clicked: false, hasCookie: false };

  componentDidMount() {
    // Check if the cookie exists
    const token = document.cookie.replace(/(?:(?:^|.*;\s*)token\s*=\s*([^;]*).*$)|^.*$/, '$1');
    this.setState({ hasCookie: !!token });
  }

  handleClick = () => {
    
    this.setState({ clicked: !this.state.clicked });
  };

  handleLogout = () => {
    // Perform logout logic here (e.g., clear cookies, update state)
    // Example: document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    // Update state accordingly
    
    document.cookie = 'token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';

    // Update state accordingly
    this.setState({ hasCookie: false });
    window.location.href = '/';
  };

  render() {
    const homeButton = this.state.hasCookie ? (
      <>
        <li>
          <Link className="nav-links" to="/index">
            <i className="fa-solid fa-house"></i>Home
          </Link>
        </li>
        <li>
          <Link className="nav-links" to="/addPackage">
            <i className="fa-solid fa-house"></i>Add Package
          </Link>
        </li>
        <li>
          <Link className="nav-links" to="/history">
            <i className="bi bi-clock-history"></i>History
          </Link>
        </li>
      </>
    ) : (
      <li>
        <Link className="nav-links" to="/">
          <i className="fa-solid fa-house"></i>Home
        </Link>
      </li>
    );

    return (
      <nav className="NavbarItems" onClick={this.handleClick}>
        <h1 className="navbar-logo">Travels and Tales</h1>
        <div className="menu-icons">
          <i className={this.state.clicked ? "fas fa-times" : "fas fa-bars"}></i>
        </div>

        <ul className={this.state.clicked ? "nav-menu active" : "nav-menu"}>
          {homeButton}
          {MenuItems.map((item, index) => (
            <li key={index}>
              <Link className={item.cName} to={item.url}>
                <i className={item.icon}></i>
                {item.title}
              </Link>
            </li>
          ))}

          {/* Conditionally render the Login and Logout buttons */}
          <li>
            {!this.state.hasCookie ? (
              <Link className="nav-links" to='/login'>
                <i className="bi bi-door-open-fill"></i>Login
              </Link>
            ) : (
              <Link to='/' className="btn ">
                <button className="nav-links" onClick={this.handleLogout}>
                  <i className="bi bi-box-arrow-right"></i>Logout
                </button>
              </Link>
            )}
          </li>
        </ul>
      </nav>
    );
  }
}

export default Navbar;