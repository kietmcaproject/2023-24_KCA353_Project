import React, { useEffect, useState } from 'react'

const Subtotal = ({iteam}) => {
  const[price,setPrice]=useState(0);

  useEffect(()=>{
    totalAmount();
  },[iteam])

  const totalAmount=()=>{
    let price =0;
    iteam.map((item)=>{
      price = item.price.cost + price
    });
    setPrice(price);
     
  }
  return (
    <div className='sub_iteam'>
        <h3>Subtotal ( items): <strong style={{fontWeight:700,color:"#111"}}>₹{price}.00</strong></h3>
      
    </div>
  )
}

export default Subtotal
