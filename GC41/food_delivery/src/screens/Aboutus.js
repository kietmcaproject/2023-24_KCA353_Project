import React from "react";
import "./aboutus.css";
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import Aboutusimg from "./myimages/aboutus.jpg";
const Aboutus = () => {
  return (
    <>
      <Navbar />
      <br /> <br />
      {/* <div className="about-us-container d-block">
      <h1>About Us</h1>
      <p>
        Welcome to our food ordering website! We are passionate about delivering
        delicious and high-quality meals to your doorstep. Our team is dedicated
        to providing a seamless and enjoyable dining experience for our customers.
      </p>
      <p>
        At [Your Company Name], we believe in using fresh and locally sourced
        ingredients to create mouthwatering dishes that cater to various tastes
        and preferences. Whether you're a fan of traditional cuisines or looking
        for something adventurous, our menu has something for everyone.
      </p>
      <p>
        Our commitment extends beyond just food. We strive to provide excellent
        customer service, ensuring that your orders are delivered promptly and
        accurately. Your satisfaction is our priority.
      </p>
      <p>
        Our commitment extends beyond just food. We strive to provide excellent
        customer service, ensuring that your orders are delivered promptly and
        accurately. Your satisfaction is our priority.
      </p>
      <p>
        Our commitment extends beyond just food. We strive to provide excellent
        customer service, ensuring that your orders are delivered promptly and
        accurately. Your satisfaction is our priority.
      </p>
      <p>
        Our commitment extends beyond just food. We strive to provide excellent
        customer service, ensuring that your orders are delivered promptly and
        accurately. Your satisfaction is our priority.
      </p>
      <p>
        Thank you for choosing [Your Company Name] for your dining needs. We look
        forward to serving you and making your dining experience memorable.
      </p>
    </div>
    <Footer/> */}
      <div className="maindiv">
        <div className="div1">
          <img src={Aboutusimg} alt="aboutus" />
        </div>
        <div className="div2">
          <h2 className="m-3 mt-5 text-center badge bg-success fs-5">
            About Us
          </h2>
          <p className="m-3 text-wrap">
            Launched in 2010, Our technology platform connects customers,
            restaurant partners and delivery partners, serving their multiple
            needs. Customers use our platform to search and discover
            restaurants, read and write customer generated reviews and view and
            upload photos, order food delivery, book a table and make payments
            while dining-out at restaurants. On the other hand, we provide
            restaurant partners with industry-specific marketing tools which
            enable them to engage and acquire customers to grow their business
            while also providing a reliable and efficient last mile delivery
            service. We also operate a one-stop procurement solution, Hyperpure,
            which supplies high quality ingredients and kitchen products to
            restaurant partners. We also provide our delivery partners with
            transparent and flexible earning opportunities.
          </p>
        </div>
      </div>
        <Footer/>
    </>
  );
};

export default Aboutus;
