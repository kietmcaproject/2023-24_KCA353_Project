import React from 'react'
import './mpayment.css'
import Payment from './myimages/qr.jpg';
import Navbar from '../components/Navbar';
import { Link, useNavigate } from "react-router-dom";
const Mpayment = () => {
    let navigate = useNavigate();
    let amt=localStorage.getItem("totprice");
    const handlePay=()=>{
        alert("Payment Successfully Done ✔️")
        navigate("/");
    }
  return (
  <>
  <Navbar/>
  <br />
    <div className="pmaindiv mt-3">

        <div className="pdiv1">
            <img src={Payment} alt="" className='m-5' />
        </div>
        <div className="pdiv2">
         <div class="pcontainer">
        <div class="payment-div"> 
            <h2>Payment Details</h2>            
            <h3 className='mt-2 btn btn-warning'><b> Total Amount : <span>&#8377; {amt}</span></b> </h3> 
            <button type="submit btn btn-success" className='paybtn' onClick={handlePay}>Scan & Pay</button>
        </div>
    </div>
        </div>
    </div>
  </>
    
  )
}

export default Mpayment