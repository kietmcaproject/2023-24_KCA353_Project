import React, { useState } from "react";
import { useNavigate, Link } from "react-router-dom";
import Navbar from "../components/Navbar";
import "./signup.css";
export default function Signup() {
  const [credentials, setCredentials] = useState({
    name: "",
    email: "",
    password: "",
    geolocation: "",
  });
  let [address, setAddress] = useState("");
  let navigate = useNavigate();

  const handleClick = async (e) => {
    e.preventDefault();
    let navLocation = () => {
      return new Promise((res, rej) => {
        navigator.geolocation.getCurrentPosition(res, rej);
      });
    };
    let latlong = await navLocation().then((res) => {
      let latitude = res.coords.latitude;
      let longitude = res.coords.longitude;
      return [latitude, longitude];
    });
    // console.log(latlong)
    let [lat, long] = latlong;
    console.log(lat, long);
    const response = await fetch("http://localhost:5000/api/auth/getlocation", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ latlong: { lat, long } }),
    });
    const { location } = await response.json();
    console.log(location);
    setAddress(location);
    setCredentials({ ...credentials, [e.target.name]: location });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    const response = await fetch("http://localhost:5000/api/auth/createuser", {
      // credentials: 'include',
      // Origin:"http://localhost:3000/login",
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        name: credentials.name,
        email: credentials.email,
        password: credentials.password,
        location: credentials.geolocation,
      }),
    });
    const json = await response.json();
    console.log(json);
    if (json.success) {
      //save the auth toke to local storage and redirect
      localStorage.setItem("token", json.authToken);
      navigate("/login");
    } else {
      alert("Enter Valid Credentials");
    }
  };

  const onChange = (e) => {
    setCredentials({...credentials, [e.target.name]: e.target.value });
  };
  // for show password
  const [password, setPassword] = useState('');
  const [showPassword, setShowPassword] = useState(false);
  const handleShowPasswordToggle = () => {
    setShowPassword(!showPassword);
  };
  return (
    <>
      <Navbar />
      <div
        style={{
          backgroundImage:
            'url("https://images.pexels.com/photos/1565982/pexels-photo-1565982.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1")',
          backgroundSize: "cover",
          height: "100vh",
        }}
      >
        {/* <div style={{ backgroundImage: 'url("https://images.pexels.com/photos/1435895/pexels-photo-1435895.jpeg?auto=compress&cs=tinysrgb&w=1200&h=750&dpr=1")', backgroundSize: 'cover',height: '100vh' }}> */}
        <div className="container d-inline-block">
          <form className="mysignup border rounded" onSubmit={handleSubmit}>
            <h3 className="text-center">Sign Up</h3>
            <hr style={{color:"red",height:"5px",margin:"0px"}}/>
            <div className="m-2">
              <label htmlFor="name" className="form-label">
                Name
              </label>
              <input
                type="text"
                className="form-control"
                name="name"
                value={credentials.name}
                onChange={onChange}
                aria-describedby="emailHelp"
                required
              />
            </div>
            <div className="m-2">
              <label htmlFor="email" className="form-label">
                Email address
              </label>
              <input
                type="email"
                className="form-control"
                name="email"
                value={credentials.email}
                onChange={onChange}
                aria-describedby="emailHelp"
                required
              />
            </div>
            <div className="m-2">
              <label htmlFor="address" className="form-label">
                Address
              </label>
              <fieldset>
                <input
                  type="text"
                  className="form-control"
                  name="address1"
                  placeholder='"Click below for fetching address"'
                  value={address}
                  onChange={(e) => setAddress(e.target.value)}
                  aria-describedby="emailHelp"
                />
              </fieldset>
            </div>
            <div className="m-2">
              <button
                type="button"
                onClick={handleClick}
                name="geolocation"
                className=" btn btn-warning"
              >
                Click for current Location{" "}
              </button>
            </div>
            <div className="m-2">
              <label htmlFor="exampleInputPassword1" className="form-label">
                Password
              </label>
              <input
                type={showPassword ? 'text' : 'password'}
                className="form-control"
                value={credentials.password}
                onChange={onChange}
                name="password"
              />
              <label htmlFor="" className="mt-2 ml-3">
                Show Password:
                <input
                  type="checkbox"
                  className="form-check-input mx-2 "
                  checked={showPassword}
                  onChange={handleShowPasswordToggle}
                />
              </label>
            </div>

            <button type="submit" className="m-2 mt-0 btn" style={{backgroundColor:"#0366D6"}}>
              Submit
            </button>
            <Link to="/login" className="m-2 mx-1 mt-0 btn" style={{backgroundColor:"#0366D6"}}>
              Already a user
            </Link>
          </form>
        </div>
      </div>
    </>
  );
}
