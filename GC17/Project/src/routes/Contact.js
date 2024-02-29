import Hero from "../components/Hero";
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import owner from "../assets/about.png";

import contactImg from "../assets/lake.jpg";
function Contact() {
  return (
    <>
      <Navbar />
      {/* <Hero
        cName="hero-mid"
        heroImg={contactImg}
        title="Contact"
        btnClass="hide"
      /> */}
            <Hero cName="hero" heroImg={owner} title="owner" btnClass="hide" />

      <Footer />
    </>
  );
}

export default Contact;
