import Hero from "../components/Hero";
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import aboutImg from "../assets/About.jpg";
import owner from "../assets/about.png";
import "./styleBack.css";
function About() {
  return (
    <>
    <div className="about">
      <Navbar />
      {/* <Hero cName="hero-mid"    btnClass="hide" /> */}
      
<div className="containerAbout ">

    <div className="flex items-center justify-center h-screen">
      <blockquote className="text-2xl text-yellow-400 drop-shadow-2xl italic">
        "Embrace the journey, learn from the challenges, and celebrate the victories. Life is a beautiful adventure waiting to be explored."
      </blockquote>
    </div>
</div>
      {/* <Hero cName="hero" heroImg={owner} title="owner" btnClass="hide" /> */}
      <Footer />
      </div>
    </>
  );
}

export default About;
