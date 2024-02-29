import React, { useEffect, useState } from 'react';
import { useAuth } from '../Context/AuthContext';
import Card from './Card';

export default function CardList({packages}) {
  const { authToken } = useAuth();
  //const [packages, setPackages] = useState([]);

  const handleSelect = async (packageId) => {
    try {
      const res = await fetch('http://localhost:5000/choose-package', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': authToken,
        },
        body: JSON.stringify({ packageId }),
      });

      const data = await res.json();
      console.log(data); // Log the response from the backend
      // Handle success or error as needed
    } catch (error) {
      console.error(error);
      // Handle error
    }
  };

  useEffect(() => {
    
  }, []);

  return (
    <div className="" style={{ backgroundColor: "#ade8f4" }}>
      <div style={{ display: 'flex', flexWrap: 'wrap' ,padding:'7px',paddingLeft:'12px'}}>
        {packages.map((data, index) => (
          <div key={index} style={{ flex: '0 0 33.33%', marginBottom: '15px' }}>
            <div className="card ml-7" style={{ width: "18rem", maxWidth: "400px" }}>
              <div className="card-body">
                <div style={{ display: "flex" }}>
                  <i class="bi bi-geo-fill"></i>
                  <h2 className="">{data.src}</h2>
                </div>
                <div style={{ display: "flex" }}>
                  <i class="bi bi-geo-alt"></i><h2 className="">{data.dest}</h2>
                </div>
                <p className="card-text">{data.description}</p>
                <h3>Price ₹{data.price}/-</h3>
                <button
                  className="btn btn-primary"
                  onClick={() => handleSelect(data._id)} // Pass packageId to handleSelect function
                >
                  Select
                </button>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}
