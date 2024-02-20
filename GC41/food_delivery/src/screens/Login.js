import React, { useState } from 'react'
import Navbar from '../components/Navbar';
import Footer from '../components/Footer';
import { useNavigate, Link } from 'react-router-dom'

import './login.css';
import { Ballot } from '@material-ui/icons';
export default function Login() {
  const [credentials, setCredentials] = useState({ email: "", password: "" })
  let navigate = useNavigate()
  const handleSubmit = async (e) => {
    e.preventDefault();
    const response = await fetch("http://localhost:5000/api/auth/login", {
      // credentials: 'include',
      // Origin:"http://localhost:3000/login",
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ email: credentials.email, password: credentials.password })
    });
    const json = await response.json()
    console.log(json);
    if (json.success) {
      //save the auth toke to local storage and redirect

      localStorage.setItem('userEmail', credentials.email)
      localStorage.setItem('token', json.authToken)
      let mail=document.getElementById("uemail").value;
      // console.log(mail="mail");
      // localStorage.setItem('ename',form.e)
      navigate("/");
      
    }
    else {
      alert("Enter Valid Credentials")
    }
  }
  const onChange = (e) => {
    console.log(e.target.name);
    if(e.target.name=='email'){
      localStorage.setItem('uemail',e.target.value);
    }
    setCredentials({ ...credentials, [e.target.name]: e.target.value })
  }
  const [password, setPassword] = useState('');
  const [showPassword, setShowPassword] = useState(false);
  const handleShowPasswordToggle = () => {
    setShowPassword(!showPassword);
  };
  return (
    <>
    <Navbar />
    <div style={{backgroundImage: 'url("https://images.pexels.com/photos/326278/pexels-photo-326278.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1")', height: '100vh', backgroundSize: 'cover' }}>
      <div className='container d-inline-block ' >
        <form className=' mylogin border-info rounded' onSubmit={handleSubmit}>
          <h3 className='text-center'>Log In</h3>
          <hr style={{color:"red",height:"5px",margin:"0px"}}/>
          <div className="m-3">
            <label htmlFor="exampleInputEmail1" className="form-label" >Email address</label>
            <input type="email" className="form-control myinput" name='email' id="uemail" value={credentials.email} onChange={onChange} placeholder='Enter your Email-Id' />
            <div id="emailHelp" className="form-text" style={{color:"black"}}>We'll never share your email with anyone.</div>
          </div>
          <div className="m-3">
            <label htmlFor="exampleInputPassword1" className="form-label">Password</label>
            <input type={showPassword ? 'text' : 'password'} className="form-control myinput" value={credentials.password} onChange={onChange} name='password' placeholder='Enter  your password' />
            <label className='mt-2 ml-3'>
        Show Password:
        <input
          type="checkbox"
          className='form-check-input mx-2 '
          checked={showPassword}
          onChange={handleShowPasswordToggle}
        />
      </label>          </div>
          <button type="submit" style={{backgroundColor:"#0366D6"}} className="m-2 mt-0 btn btn-success text-white">Submit</button>
          <Link to="/signup" style={{backgroundColor:"#0366D6"}}className="m-2 mt-0 btn btn-primary">New User</Link>
        </form>
      </div>
    </div>
    </>
  )
}


// , 'Accept': 'application/json',
//         'Access-Control-Allow-Origin': 'http://localhost:3000/login', 'Access-Control-Allow-Credentials': 'true',
//         "Access-Control-Allow-Headers": "Origin, X-Requested-With, Content-Type, Accept",'Access-Control-Allow-Methods': 'PUT, POST, GET, DELETE, OPTIONS'