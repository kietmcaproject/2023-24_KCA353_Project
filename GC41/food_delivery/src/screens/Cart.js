import React from 'react'
import Delete from '@material-ui/icons/Delete'
import { useCart, useDispatchCart } from '../components/ContextReducer';
import './cart.css';
import {Link} from "react-router-dom";
import { LocalParking } from '@material-ui/icons';

export default function Cart() {
  let data = useCart();
  let dispatch = useDispatchCart();
  if (data.length === 0) {
    return (
      <div>
        {/* <div className='m-5 w-100 text-center fs-3'>The Cart is Empty!</div> */}
        {/* <div className='m-5 w-100 text-center fs-3'>Order Successfully Placed !😋</div> */}
        <div className='m-5 w-100 text-center fs-3'>Your Cart is Empty !! 🛒</div>
      </div>
    )
  }
  const handleCheckOut = async () => {
    let userEmail = localStorage.getItem("userEmail");
    let response = await fetch("http://localhost:5000/api/auth/orderData", {
      // credentials: 'include',
      // Origin:"http://localhost:3000/login",
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        order_data: data,
        email: userEmail,
        order_date: new Date().toDateString()
      })
    });
    // console.log("JSON RESPONSE:::::", response.status)
    if (response.status === 200) {
      dispatch({ type: "DROP" })
    }
  }
  
  let totalPrice = data.reduce((total, food) => total + food.price, 0)
  localStorage.setItem("totprice",totalPrice);
  return (
    <div>
      {/* {console.log(data)} */}
      <div className='container  m-auto mt-2 table-responsive mycart  table-responsive-sm table-responsive-md' >
        <table className='table table-hover '>
          <thead className='text-info fs-5'>
            <tr>
              <td scope='col' >SNo</td>
              <td scope='col' >Name</td>
              <td scope='col' >Quantity</td>
              <td scope='col' >Size</td>
              <td scope='col' >Amount</td>
              <td scope='col' >Remove</td>
            </tr>
          </thead>
          <tbody>
            {data.map((food, index) => (
              <tr>
                <th scope='row' >{index + 1}</th>
                <td >{food.name}</td>
                <td>{food.qty}</td>
                <td>{food.size}</td>
                <td>{food.price}</td>
                <td ><button type="button" className="btn p-0"><Delete onClick={() => { dispatch({ type: "REMOVE", index: index }) }} /></button> </td></tr>
            ))}
          </tbody>
        </table>
        <div><h1 className='fs-4 text-warning'>Total Price: {totalPrice}/-</h1></div>
        <div>
          <Link className='btn bg-success mt-3 mb-3' onClick={handleCheckOut} to="/payment"> Check Out </Link>
        </div>
      </div>
    </div>
  )
}
