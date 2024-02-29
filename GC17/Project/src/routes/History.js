import React, { useState, useEffect } from 'react';

export default function History() {
  const [userPackages1, setUserPackages] = useState([]);

  useEffect(() => {
    const fetchUserPackages = async () => {
      try {
        const token = document.cookie.replace(/(?:(?:^|.*;\s*)token\s*=\s*([^;]*).*$)|^.*$/, '$1');
        const res = await fetch('http://localhost:5000/user-packages', {
          method: 'GET',
          headers: {
            'Content-Type': 'application/json',
            'Authorization': token,
          },
        });

        const data = await res.json();
        setUserPackages(data);
      } catch (error) {
        console.error(error);
        // Handle error
      }
      
    };
    

    fetchUserPackages();
  }, []); // Empty dependency array ensures that the effect runs only once when the component mounts


  return (
    <div>
      <h1 className='m-4 ' style={{fontSize:"larger"}}>Selected Package</h1>
    <div className="row row-cols-1 row-cols-md-3 g-4 m-3">
      
      {userPackages1.map((userPackage, index) => (
        <div key={index} className="col">
          <div className="card" style={{ width: "18rem",backgroundColor:"#e3d5ca" }}>
            <div className="card-body">
              
              <h5 className=" mb-2 "><i class="bi bi-geo-fill"></i>Source: {userPackage.src}</h5>
              <h5 className="card-subtitle mb-2 "> <i class="bi bi-geo-alt"></i>Destination: {userPackage.dest}</h5>
              {/* <p className="card-text">Description: {userPackage.description}</p> */}
              <h6 className="card-subtitle mb-2 text-body-secondary"><i class="bi bi-wallet2"></i>Price: ₹{userPackage.price}</h6>
              {/* Add other properties you want to display */}
            </div>
          </div>
        </div>
      ))}
    </div>
    </div>
  );
}