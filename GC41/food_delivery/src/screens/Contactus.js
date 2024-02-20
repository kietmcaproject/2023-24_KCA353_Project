import React from "react";
import "./ContactUs.css";
import Facebook from "@material-ui/icons/Facebook";
import Instagram from "@material-ui/icons/Instagram";
import Twitter from "@material-ui/icons/Twitter";
import Badge from "@material-ui/core/Badge";
import Navbar from "../components/Navbar";
import { Link, useNavigate } from "react-router-dom";
import Footer from "../components/Footer";

const Contactus = () => {
  let navigate = useNavigate()
  const handleSubmit = ()=>{
    alert("We will connect with you soon!😊");
    navigate("/");
  }
  return (
    <>
      <Navbar />
      <br /> <br />
      <div className="contact-us-container">
      <form action="" onSubmit={handleSubmit}>
        <h1>Contact Us</h1>
        <p>
          Have a question or feedback? We'd love to hear from you! Feel free to
          reach out to us through the contact form below, or connect with us on
          social media.
        </p>
        <div className="contact-form">
          <label htmlFor="name" className="lbl">
            Your Name:
          </label>
          <input
            type="text"
            id="name"
            className="inp"
            name="name"
            placeholder="Enter your name"
            required="required"
          />

          <label htmlFor="email" className="lbl">
            Your Email:
          </label>
          <input
            type="email"
            id="email"
            name="email"
            className="inp"
            placeholder="Enter your email"
            required="true"
          />

          <label htmlFor="message" className="lbl">
            Your Message:
          </label>
          <textarea
            id="message"
            name="message"
            className="textarea"
            placeholder="Type your message here"
          ></textarea>

          <button type="submit"className="sbtn">
            Submit
          </button>
        </div>
      </form>

        <div className="social-media">
          <p>Connect with us on social media:</p>
          <div className="social-icons">
            {/* Add your social media icons and links here */}
            <div className=" text-white">
              <Facebook />
            </div>
            <div className="text-white">
              <Instagram />
            </div>
            <div className="text-white">
              <Twitter />
            </div>
            {/* Add more social media icons as needed */}
          </div>
        </div>
      </div>
      <Footer/>
    </>
  );
};

export default Contactus;
