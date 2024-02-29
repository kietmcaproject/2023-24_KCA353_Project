import React, { useState } from 'react';
import "./HeroStyles.css";

function Hero(props) {
  const [isButtonClicked, setIsButtonClicked] = useState(false);

  const handleButtonClick = () => {
    // Perform actions when the button is clicked
    setIsButtonClicked(true);
  };

  return (
    <>
      <div className={props.cName}>
        <img alt="heroimg" src={props.heroImg} />
        <div className="hero-text">
          <h1>{props.title}</h1>
          <p>{isButtonClicked ? 'Button Clicked!' : props.text}</p>
          
        </div>
      </div>
    </>
  );
}

export default Hero;
