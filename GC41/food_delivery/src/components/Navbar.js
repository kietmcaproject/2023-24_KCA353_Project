/* eslint-disable react/jsx-no-undef */
import React, { useState } from 'react'
import { Link, useNavigate } from "react-router-dom";
import Badge from "@material-ui/core/Badge";
import ShoppingCartIcon from "@material-ui/icons/ShoppingCart";
import { useCart } from './ContextReducer';
import Modal from '../Modal';
import Cart from '../screens/Cart';
import './navbar.css';
import  Logo from './My-Logo.png';
export default function Navbar(props) {

    const [cartView, setCartView] = useState(false)
    const mailid=localStorage.getItem("uemail");
    // const username=localStorage.getItem("uname");
    // const unm=JSON.parse(localStorage.getItem("uname"));
    // console.log(unm);

    // console.log(username);
    localStorage.setItem('temp', "first")
    let navigate = useNavigate();
    const handleLogout = () => {
        localStorage.removeItem('token')

        navigate("/login")
    }

    const loadCart = () => {
        setCartView(true)
    }

    const items = useCart();
    return (
        <div>
            <nav className="navbar navbar-expand-lg mynav position-fixed"
                style={{ zIndex: "10", width: "100%",height:"60px" }}>
                <div className="container-fluid ">
                <div className='mylogo'>
                <img src={Logo} alt="LOGO" />
                </div>
                    {/* <Link className="navbar-brand fs-1 " to="/">Foodies</Link> */}
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="navbar-nav me-auto mb-2 mb-lg-0 ">
                            <li className="nav-item">
                                <Link className="nav-link fs-5 mx-3 active" aria-current="page" to="/"><span>Home</span></Link>  {/* index.css - nav-link color white */}
                            </li>
                            <li className="nav-item">
                                <Link className="nav-link fs-5 mx-3 active" aria-current="page" to="/aboutus"><span>About Us</span></Link>  {/* index.css - nav-link color white */}
                            </li>
                            <li className="nav-item">
                                <Link className="nav-link fs-5 mx-3 active" aria-current="page" to="/contactus"><span>Contact Us</span></Link>  {/* index.css - nav-link color white */}
                            </li>
                            {(localStorage.getItem("token")) ?
                                <li className="nav-item">
                                    <Link className="nav-link fs-5 mx-3 active" aria-current="page" to="/myorder" ><span>My Orders</span></Link>  {/* index.css - nav-link color white */}
                                </li> : ""}
                        </ul>
                        {(!localStorage.getItem("token")) ?
                            <form className="d-flex">
                                <Link className="btn btn-outline-success mx-1 " to="/login">Login</Link>
                                <Link className="btn btn-outline-warning  mx-1" to="/signup">Signup</Link>
                            </form> :
                            <div style={{width:"40%"}} className='d-flex justify-content-end'>
                                <span className='mt-2  text-info user-email'>{mailid}</span>
                                <div className="btn bg-warning text-white mx-2 " onClick={loadCart}>
                                    <Badge color="secondary" badgeContent={items.length} >
                                        <ShoppingCartIcon />
                                    </Badge>
                                    Cart
                                </div>

                                {cartView ? <Modal onClose={() => setCartView(false)}><Cart></Cart></Modal> : ""}

                                <button onClick={handleLogout} className="btn bg-danger btn-logout1 text-white" >Logout</button>
                            </div>}
                    </div>
                </div>
            </nav>
        </div>
    )
}
