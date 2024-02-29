
import React,{useRef, useState} from "react";
import '../styles/tour-details.css';
import { Container, Row, Col, ListGroup } from "reactstrap";
import {useParams} from 'react-router-dom';
import tourData from '../assets/data/tours';
import calculateAvgRating from "./../utils/avgRating";
import avatar from "../assets/images/avatar.jpg";

const TourDetails = () => {

const {id} = useParams()
const reviewMsgRef = useRef('')
const[/*tourRating,*/ setTourRating] = useState(null)

const tour = tourData.find(tour => tour.id === id)
const {photo, title, desc,reviews}  = tour

const {totalRating, avgRating} = calculateAvgRating(reviews);
const options = { day : "numeric", month : "long", year : "numeric"};

const submitHandler = e =>{
  e.preventDefault();
  // const reviewText = reviewMsgRef.current.value;

  // alert('${reviewText}, ${tourRating}');
}

return (
    <>
    <section>
      <Container>
        <Row>
          <Col lg="8">
            <div className="tour__content">
              <img src={photo} alt=""/>
                <div className="tour__info">
                   <h2>{title}</h2>

                   <div className="d-flexalign-items-center gap-5">
                        <span className="tour__rating d-flex
                        align-items-center gap-1">
                        <i class="ri-star-s-fill" style={{color: "var(--secondry-color)"}} ></i>
                        {calculateAvgRating === 0? null:
                        avgRating}
                        {totalRating ===0? (
                        "Not rated"
                        ): (
                            <span>({reviews.length})</span>
                        )}
                        </span>
                  
                        <div>
                          <h5>Discription</h5>
                          <p>{desc}</p>
                        </div>

                  <div className="tour__reviews mt-4">
                    <h4>Reviews({reviews?.length} reviews)</h4>

                    <form onSubmit={submitHandler}>
                      <div className="d-flex align-items-center gap-3 mb-4 rating__group">
                        <span onClick={() => setTourRating(1)}>
                        1 <i class="ri-star-s-fill"></i>
                        </span>
                        <span onClick={() => setTourRating(2)}>
                        2 <i class="ri-star-s-fill"></i>
                        </span>
                        <span onClick={() => setTourRating(3)}>
                        3 <i class="ri-star-s-fill"></i>
                        </span>
                        <span onClick={() => setTourRating(4)}>
                        4 <i class="ri-star-s-fill"></i>
                        </span>
                        <span onClick={() => setTourRating(5)}>
                        5 <i class="ri-star-s-fill"></i> I
                        </span>
                      </div>

                      <div className="review__input">
                        <input type="text" ref={reviewMsgRef} placeholder="share your thoughts" required/>
                        <button
                          className="btn primary__btn text-white"
                          type="submit">
                          Submit
                        </button>
                      </div>
                    </form>
                  </div>
                <ListGroup className="user_reviews">
                {
                  reviews?.map(review => (
                    <div className="review__item">
                      <img src= {avatar} alt=""/>
                    
                        <div className="w-100">
                          <div className="d-flex align-items-center justify-content-between">
                            <div>
                              <h5>Diksha</h5>
                              <p>
                                {new Date("01-18-2023").toLocaleDateString( "en-US", options )}
                              </p>
                            </div>
                            <span className="d-flex align-items-center">
                              5<i class="ri=start-s-fill"></i> 
                            </span>
                          </div>
                          <h5>Amazing Musuemsz</h5>
                        </div>
                    </div>
                  ))
                }
                </ListGroup>
              </div>
            </div>
            </div>
          </Col>
        </Row>
      </Container>
    </section>
</>
);
};
export default TourDetails;