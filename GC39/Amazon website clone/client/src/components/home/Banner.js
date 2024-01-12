import React from 'react'
import Carousel from 'react-material-ui-carousel';
import "./banner.css";

const data = [
    "https://images-eu.ssl-images-amazon.com/images/G/31/img22/Baby/cnnjpp1/Baby/D92807365-_1_Tallhero_2xx._CB598669664_.jpg",
    " https://m.media-amazon.com/images/I/81KkrQWEHIL._SX3000_.jpg",
    "https://m.media-amazon.com/images/I/61zAjw4bqPL._SX3000_.jpg",
    "https://m.media-amazon.com/images/I/71Ie3JXGfVL._SX3000_.jpg",
   
]

const Banner = () => {
  return (
   <Carousel 
   className='carasousel'
    autoplay={true}
    animation='slide'
    indicators={false}
    navButtonsAlwaysVisible={true}
    cycleNavigation={true}
    
    navButtonsProps={{
        style:{
            backGroundcolor:"#F8F8FF",
            color:"#FFFAF0",
            borderRadius:0,
            marginTop:-22,
            height:'104px'
        }
    }}
    >
     {
        data.map((imag,i)=>{
            return(
                <>
                <img src={imag} alt="" className='banner_img' />
                </>
            )
        })
     }
   </Carousel>
  )
}

export default Banner;
