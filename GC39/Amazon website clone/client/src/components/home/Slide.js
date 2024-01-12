import React from 'react'
import "../home/slide.css";
import Carousel from "react-multi-carousel";
import "react-multi-carousel/lib/styles.css";
import { Divider } from "@mui/material";
// import { products } from './productdata';
import { NavLink } from "react-router-dom";


const responsive = {
  desktop: {
    breakpoint: { max: 3000, min: 1024 },
    items: 3,

  },
  tablet: {
    breakpoint: { max: 1024, min: 464 },
    items: 2,

  },
  mobile: {
    breakpoint: { max: 464, min: 0 },
    items: 1,

  }
};

const Slide = ({ title, products }) => {
  return (
    <div className='products_section'>
      <div className="products_deal">
        <h3>{title}</h3>
        <button className='view_btn'>View All</button>
      </div>
      <Divider />

      <Carousel
        responsive={responsive}
        infinite={true}
        draggable={false}
        swipeable={true}
        showDots={false}
        centerMode={true}
        autoPlay={true}
        autoPlaySpeed={4000}
        keyBoardControl={true}
        removeArrowOnDeviceType={["tablet", "moblie"]}
        dotListClass="custom-dot-list-style"
        itmeClass="carousel-item-padding-40-px"
        containerClass="carousel-container"
      >
        {
          products.map((e) => {
            return (

              <NavLink to={`/getproductsone/${e.id}`}>
                <div className='products_items'>
                  <div className='product_img'>
                    <img src={e.url} alt="productitem" />

                  </div>
                  <p className='products_name'>{e.title.shortTitle} </p>
                  <p className='products_offer'>{e.discount} </p>
                  <p className='products_explore'>{e.tagline} </p>
                </div>
              </NavLink>

            )
          })
        }
      </Carousel>

    </div>
  )
}

export default Slide
