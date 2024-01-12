import React from 'react'
import "../footer/footr.css";

const Footer = () => {

    const year = new Date().getFullYear();
    console.log(year);

    return (
        <footer>
            <div className="footer_container">
                <div className="footr_details_one">
                    <h3>Get to Know US</h3>
                    <p>About us</p>
                    <p>Careers</p>
                    <p>Press Releases</p>
                    <p>Amazon Science</p>
                </div>
                <div className="footr_details_one">
                    <h3>Connect with Us</h3>
                    <p>Facebook</p>
                    <p>Twitter</p>
                    <p>Instagram</p>
                </div>
                <div className="footr_details_one forres">
                    <h3>Make Money with Us</h3>
                    <p>Sell on Amazon</p>
                    <p>Sell under Amazon Accelerator</p>
                    <p>Amazon Global Selling</p>
                    <p>Advertise your product</p>
                    <p>Amazon pay on merchants</p>
                </div>
                <div className="footr_details_one forres">
                    <h3>Let Us Help You</h3>
                    <p>Covid-19 and Amazon</p>
                    <p>Your Account</p>
                    <p>Returns Center</p>
                    <p>Amazon App Download</p>
                    <p>Help</p>
                </div>
            </div>
            <div className="lastdetails">
                <img src="./amazon_PNG25.png" alt="logo" />
                <p>Conditions of Use & Sale &nbsp; &nbsp;&nbsp;  Privacy Notice  &nbsp; &nbsp;&nbsp; Interest-Based Ads  &nbsp; &nbsp;&nbsp;  © 1996-{year}, Amazon.com, Inc. or its affiliates</p>
            </div>
            
        </footer>
    )
}

export default Footer
