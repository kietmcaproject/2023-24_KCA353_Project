import React, { useState } from 'react'
import { NavLink } from 'react-router-dom'
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';


const SignUp = () => {
    const[udata,setUdata]=useState({
        fname:"",
        email:"",
        mobile:"",
        password:"",
        cpassword:""
    });
    console.log(udata);


    const adddata = (e)=>{
        const{name,value}=e.target;

        setUdata(()=>{
            return{
                ...udata,
                [name]:value
        }
        })
    };

    const senddata = async(e)=>{
         e.preventDefault();
         const {fname, email, mobile, password, cpassword} = udata;

        //  if(fname===""){
        //     toast.warn("Please Enter Your Name",{
        //         position: "top-center",
        //     })
        //  } else if(email===""){
        //     toast.warn("Please Enter Your Email",{
        //         position: "top-center",
        //     })
        //  } else if(mobile ===""){
        //     toast.warn("Please Enter Your Mobile no",{
        //         position: "top-center",
        //     })
        //  }
         

         const res = await fetch("register",{
            method:"POST",
            headers:{
                "Content-Type":"application/json"
            },
            body:JSON.stringify({
                fname, email, mobile, password, cpassword
            })
         });
         const data = await res.json();
        //  console.log(data);
        if(res.status === 422 || !data){
        //  alert("No data")
        toast.warn("Invalid Details",{
            position: "top-center",
        })
        } else{
            // alert("data succesfully added");
            toast.success("User Succesfully Added",{
                position: "top-center",
            })
                
            
            setUdata({...udata,fname:"",email:"",mobile:"",password:"",cpassword:""});
        }
    }
  return (
    <>
      <section>
        <div className="sign_container">
            <div className="sign_header">
             <NavLink to="/">   <img src=".\blacklogoamazon.png" alt="amazonLogo" /> </NavLink>
            </div>
            <div className="sign_form">
                <form method='POST'>
                    <h1>Sign-Up</h1>
                    
                    <div className="form_data">
                        <label htmlFor="fname">Your Name</label>
                        <input type="text" 
                         onChange={adddata}
                         value={udata.fname}
                        name='fname' placeholder='Enter Your Name' id="fname" />
                    </div>
                    <div className="form_data">
                        <label htmlFor="email">Email</label>
                        <input type="text"
                        onChange={adddata}
                        value={udata.email}
                        name='email' placeholder='Enter Email Id' id="email" />
                    </div>
                    <div className="form_data">
                        <label htmlFor="number">Mobile No</label>
                        <input type="text"
                        onChange={adddata}
                        value={udata.mobile}
                        name='mobile' placeholder='Enter Your Mobile No' id="mobile" />
                    </div>
                    <div className="form_data">
                        <label htmlFor="password">Password</label>
                        <input type="password" 
                        onChange={adddata}
                        value={udata.password}
                        name='password'placeholder='At least 6 character' id="password" />
                    </div>
                    <div className="form_data">
                        <label htmlFor="cpassword">Password Again</label>
                        <input type="password" 
                         onChange={adddata}
                         value={udata.cpassword}
                        name='cpassword'placeholder='Confirm Your Password' id="cpassword" />
                    </div>
                    <button className='signin_btn'onClick={senddata}>Continue</button>
                    <div className="signin_info">
                        <p>Already have an account ?</p>
                        <NavLink to="/login">Signin</NavLink>
                    </div>
                </form>
                
            </div>
            <ToastContainer />
            
        </div>
      </section>
    </>
  )
}

export default SignUp
