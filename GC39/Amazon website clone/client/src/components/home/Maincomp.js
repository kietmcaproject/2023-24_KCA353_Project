import React, { useEffect } from 'react'
import Banner from './Banner';
import "./home.css";
import Slide from './Slide';
import { getProducts } from '../redux/actions/action';
import { useDispatch, useSelector } from 'react-redux';
import { Divider } from '@mui/material';


const Maincomp = () => {

  const{products}= useSelector(state => state.getProductsdata);
  console.log(products);

  const dispatch =useDispatch();
  useEffect(()=>{
    dispatch(getProducts());
  },[dispatch]);
  return (
    <>
    <div className='home_section'>
    <div className="banner_part">
        <Banner />
    </div>

    <div className="slide_part">
      <div className="left_slide">
      <Slide title="Deal Of The Day" products={products}/>
      </div>
      <div className="right_slide">
     <h4>Bluetooth Calling Smartwatch starts at ₹1,999</h4>
     
     <img src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Wearables/PC_CategoryCard_379X304_1._SY304_CB614835787_.jpg" alt="watch" />
      <a href="#">See More</a>
      </div>
    </div>
    <Slide title="Today's Deal " products={products}/>
    <div className="center_img">
      <img src="https://images-eu.ssl-images-amazon.com/images/G/31/img21/AmazonBrands/HPBCategoryIntegration/Bedsheet_1500x300.jpg" alt="sofa" />
    </div>
    <Slide title="Best Seller "  products={products}/>
    <Slide title="Upto 80% off "  products={products}/>
     
    </div>
    <Divider/>
    </>
  )
}

export default Maincomp;
