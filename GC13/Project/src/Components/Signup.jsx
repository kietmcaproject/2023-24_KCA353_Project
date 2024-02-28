import React from 'react'
import signupImg from "../assets/signup.png";
import Template from './Template';


function Signup({ setIsLoggedIn }) {
  return (
    <Template
      title="Join the ArtGallery"
      desc1="To Search Unlimitd Image."
      image={signupImg}
      formType="signup"
      setIsLoggedIn={setIsLoggedIn}
    />
  );
}

export default Signup