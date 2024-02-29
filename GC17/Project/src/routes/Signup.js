import React, { useState } from 'react';
import { Link } from 'react-router-dom';

export default function Signup() {
  const [credentials, setCredentials] = useState({
    name: '',
    email: '',
    password: '',
    geolocation: '',
  });

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch('http://localhost:5000/register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          name: credentials.name,
          email: credentials.email,
          password: credentials.password,
          Location: credentials.geolocation,
        }),
      });

      const json = await response.json();
      console.log(json);

      if (!json.success) {
        alert('Enter Valid Credentials');
      } else {
        // Optionally, you can redirect the user to another page upon successful registration.
        // For example, you can use the history object from the react-router-dom.
        // history.push('/some-path');
      }
    } catch (error) {
      console.error(error);
    }
  };

  const onChange = (e) => {
    setCredentials({ ...credentials, [e.target.name]: e.target.value });
  };

  return (
    <>
      <div className='container'>
        <form onSubmit={handleSubmit}>
          {/* ... (your existing form fields) */}
          <div className="mb-3">
            <label htmlFor="exampleInputEmail1" className="form-label">
              Address
            </label>
            <input
              type="text"
              className="form-control"
              name="geolocation"
              value={credentials.geolocation}
              onChange={onChange}
            />
          </div>

          <button type="submit" className="btn m-3 btn-warning">
            Submit
          </button>
          <Link to="/login" className='m-3 btn btn-danger'>
            Already a User
          </Link>
        </form>
      </div>
    </>
  );
}
