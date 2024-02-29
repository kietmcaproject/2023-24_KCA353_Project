import React from "react"; 
import '../styles/home.css'

import SearchBar from "../shared/SearchBar";

import { Container, Row, Col } from 'reactstrap'; 
import heroImg from '../assets/images/hero-img01.jpg';
import heroImg02 from '../assets/images/hero-img02.jpg';
import heroVideo from '../assets/images/hero-video.mp4';
import worldImg from '../assets/images/world.png';
import experienceImg from '../assets/images/experience.png';

import Subtitle from './../shared/Subtitle';
import ServiceList from "../Services/ServiceList";
import FeaturedTourList from "../components/Featured-Tours/FeatureTourList";
import MasonryImagesGallery from "../components/image-gallery/MasonryImagesGallery";
import Testimonials from "../components/Testimonial/Testimonials";
import Newsletter from "../shared/Newsletter";

const Home = () => {
return ( 
<>
  <section>
      <Container>
          <Row>
              <Col lg='6'>
                 <div className="hero__content">
                    <div className="hero__subtitle d-flex align-items-center">
                        <Subtitle subtitle={'Pricious and Acceint of world in your hand'}/>
                            <img src = {worldImg} alt = ""/>                    
                    </div>
                          <h1>Welcome to Virtual World of  <span className="highlight">MUSEUM</span></h1>
                          <p> "Welcome to our digital museum! Step into a world o
                            f history, art, and culture from the comfort of your screen.
                            Explore our curated collections, engage with interactive exhibits,
                            and discover the beauty and significance of our exhibits.
                            We invite you to embark on a journey through time and immerse
                            yourself in the wonders of our virtual museum." 
                          </p>
                  </div>
              </Col>      

              <Col lg="2">
                <div className="hero__img-box">
                    <img src = {heroImg} alt = "" />
                </div>
              </Col>
              
              <Col lg="2">
                <div className="hero__img-box mt-4">
                    <video src = {heroVideo} alt = "" controls/>
                </div>
            </Col>

              <Col lg="2">
                <div className="hero__img-box mt-5">
                    <img src = {heroImg02} alt = "" />
                </div>
              </Col>
              <SearchBar/>
          </Row>
      </Container>
  </section>
  
  <section>
            <Container>
                <Row>
                    <Col lg="3">    
                        <h5 className="services_subtitle">What we serve</h5>
                        <h2 className="services_title">We offer our best services</h2>
                    </Col>
                    <ServiceList/>
                </Row>
            </Container>
        </section>

        <section>
            <Container>
                <Row>
                    <Col lg="12" className="mb-5">
                        <Subtitle subtitle={"Explore"} />
                             <h2 className="featured__tour-title">Our featured tours</h2>
                        </Col>
                    <FeaturedTourList/>
                </Row>
            </Container>
            </section>

            <section>
                <Container>
                    <Row>
                        <Col lg="6">
                            <div className="experience__content">
                                <Subtitle subtitle={"Experience"} />
                                    <h2> With all our LOVE <br/> we will SERVE YOU </h2>
                                    <p>
                                        We are ensuring you to provide more such museums. <br/>
                                        Cheers to all Museum Enthusiast.....
                                    </p>
                            </div>

                            <div className="counter__wrapper d-flex align-items-center gap-5 ">
                                    <div className="counter__box">
                                    <h6>Explore </h6>
                                    </div>
                                    
                                    <div className="counter__box">
                                    <h6>Eat</h6>
                                    </div>

                                    <div className="counter__box">
                                    <h6>Sleep</h6>
                                    </div>

                                    <div className="counter__box ">
                                        <h6>and repeat</h6>
                                    </div>
                            </div>
                        </Col>

                        <Col lg="6">
                            <div className="experience__img">
                                <img src = {experienceImg} alt = ""/>
                            </div>
                        </Col>
                    </Row>
                </Container>
            </section>

            <section>
                <Container>
                    <Row>
                        <Col lg="12">
                            <Subtitle subtitle={"Gallery"} />
                            <h2 className="gallery_title">Explore more from us</h2>
                        </Col>
                        <Col lg='12'>
                            <MasonryImagesGallery/>
                        </Col>
                    </Row>
                </Container>
            </section>

            <section>
                <Container>
                <Row>
                <Col lg="12">
                <Subtitle subtitle={"Love"} />
                <h2 className="testimonial_title"> What our fans say about us</h2>
                </Col>
                <Col>
                    <Testimonials/>
                </Col>
                </Row>
                </Container>
            </section>
        <Newsletter/>
    </> 
  );
};

export default Home;