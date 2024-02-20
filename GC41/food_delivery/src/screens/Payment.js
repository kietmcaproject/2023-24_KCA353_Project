import React from 'react'
// import './Payment.css';
import Navbar from '../components/Navbar';
const Payment = () => {
  return (
    <>
    <Navbar/>
    <div className="payment-container">
      <div className="payment-header">
        <h1>Payment</h1>
        <p>Securely complete your order</p>
      </div>

      <div className="payment-form">
        <label htmlFor="cardNumber">Card Number</label>
        <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" />

        <div className="card-details">
          <div className="card-detail">
            <label htmlFor="expiryDate">Expiry Date</label>
            <input type="text" id="expiryDate" placeholder="MM/YY" />
          </div>

          <div className="card-detail">
            <label htmlFor="cvv">CVV</label>
            <input type="text" id="cvv" placeholder="123" />
          </div>
        </div>

        <label htmlFor="cardHolder">Card Holder</label>
        <input type="text" id="cardHolder" placeholder="John Doe" />

        <button className="pay-button">Pay Now</button>
      </div>
    </div>
    </>
  )
}

export default Payment