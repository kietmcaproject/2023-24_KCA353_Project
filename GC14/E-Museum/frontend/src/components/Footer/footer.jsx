import React from "react"; 
import "./footer.css";

import { Container, Row, Col, ListGroup, ListGroupItem } from "reactstrap";
import { Link } from "react-router-dom"; 
import logo from "../../assets/images/logo.jpg";

const quick__links = [
  {
    path: "/home",
    display: "Home",
  },
  
  {
    path: "/about",
    display: "About",
  },
  
  {
  path: "/tours", 
  display: "Tours",
  },
];

const quick__links2 = [
  {
    path: "/garelly",
    display: "Garelly",
  },
  
  {
    path: "/login",
    display: "Login",
  },
  
  {
  path: "/register", 
  display: "Resgister",
  },
];


const Footer = () => {

  const year = new Date().getFullYear()
  return (
    <footer className="footer">
      <Container>
        <Row>
          <Col lg="3">
          <div className="logo">
              <img src={logo} alt="" />
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

              <div className="social_links d-flex align-items-center gap-4"> 
                <span>
                  <Link to='#'><i class="ri-youtube-line"></i></Link>
                </span>
              
                <span>
                  <Link to='#'><i class="ri-github-line"></i></Link>
                </span>
                
                <span>
                  <Link to='#'><i class="ri-facebook-circle-line"></i></Link>
                </span>

                <span>
                  <Link to='#'><i class="ri-instagram-line"></i></Link>
                </span>

              </div>
            </div>
          </Col>

          <Col lg="3">
            <h5 className="footer__link-title">Discover</h5>

           <ListGroup className="footer_quick-links">
            {quick__links.map((item, index) => (
              <ListGroupItem key={index} className="ps-0 border-0">
                <Link to={item.path}> {item.display} </Link>
              </ListGroupItem>
            ))}
           </ListGroup>
          </Col>

          <Col lg="3">
            <h5 className="footer__link-title">Quick Links</h5>
           <ListGroup className="footer_quick-links">
            {quick__links2.map((item, index) => (
              <ListGroupItem key={index} className="ps-0 border-0">
                <Link to={item.path}> {item.display} </Link>
              </ListGroupItem>
            ))}
           </ListGroup>
          </Col>

          <Col lg="3">
            <h5 className="footer__link-title">Contact</h5>
           <ListGroup className="footer_quick-links">
              <ListGroupItem className="ps-0 border-0 d-flex align-item-center gap-3">
              <h6 className="mb-0 d-flex align-items-center gap-2">
                <span>
                  <i class="ri-map-pin-line"></i>
                </span>
                  Address:
              </h6>
              <p className="mb-0">Uttar-Pradesh, India</p>
              </ListGroupItem> 

              <ListGroupItem className="ps-0 border-0 d-flex align-item-center gap-3">
              <h6 className="mb-0 d-flex align-items-center gap-2">
                <span>
                  <i class="ri-mail-fill"></i>
                </span>
                  Email:
              </h6>
              <p className="mb-0">dikshavarshney802@gmail.com</p>
              </ListGroupItem>       
              
              <ListGroupItem className="ps-0 border-0 d-flex align-item-center gap-3">
              <h6 className="mb-0 d-flex align-items-center gap-2">
                <span>
                  <i class="ri-phone-fill"></i>
                </span>
                  Phone No:
              </h6>
              <p className="mb-0">+91 0123456789</p>
              </ListGroupItem>       
            </ListGroup>
          </Col>
          
          <Col lg="12" className="text-center pt-5">
              <p className="copyright">Copyright {year}, designed and developed by DIKSHA VARSHNEY. All rights are reversed</p>
          </Col>

        </Row>
      </Container>
    </footer>
  );
};
export default Footer;