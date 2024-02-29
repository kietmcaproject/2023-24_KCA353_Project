import Hero from "../components/Hero";
import Navbar from "../components/Navbar";
import heroImg from "../assets/home.jpg";
import Footer from "../components/Footer";
function Home() {
  return (
    <>
      <Navbar />
      <Hero
        cName="hero"
        heroImg={heroImg}
        title="Your Journey Begins"
        text="Search Your Destination"
        buttonText="Travel Places"
        btnClass="show"
      />
      <Footer />
    </>
  );
}

export default Home;
