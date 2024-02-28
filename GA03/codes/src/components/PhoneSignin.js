import React, { useState } from 'react'
import PhoneInput from 'react-phone-input-2'
import 'react-phone-input-2/lib/style.css'
import "./Phone.css"
import { Button, TextField } from '@mui/material'
import { RecaptchaVerifier, signInWithPhoneNumber } from 'firebase/auth'
import { auth } from '../firebase/setup'
import { useNavigate } from 'react-router-dom'

function PhoneSignin() {

    const navigate = useNavigate()

    const [phone,setPhone] = useState("")
    const [user,setUser] = useState(null)
    const [otp,setOtp] = useState("")

    const sendOtp = async()=>{
        try{
            const recaptcha = new RecaptchaVerifier(auth,"recaptcha",{})
            const confirmation = await signInWithPhoneNumber(auth,phone,recaptcha)
           setUser(confirmation)
        }catch(err){
            console.error(err)
        }
    }


    const verifyOtp = async()=>{
        try{
          const data = await user.confirm(otp)
          data.user.phoneNumber && navigate("/main")
        }catch(err)
        {
            console.error(err)
        }
    }

  return (
    <div className='phone-signin'>
        <h2 style={{fontWeight:"200",textAlign:"center"}}>Enter your phone number</h2>
        <h5 style={{fontWeight:"500",textAlign:"center",color:"grey"}}>Select a country and enter phone number</h5>
        <div className='phone-content'>
        <PhoneInput 
      country={"us"}
      value={phone}
      onChange={(phone)=>setPhone("+" + phone)}
      />
      <Button onClick={sendOtp} sx={{marginTop:"10px"}} variant='contained'>Send Otp</Button>
      <div style={{marginTop:"10px"}} id="recaptcha"></div>
      <br/>
      <TextField onChange={(e)=> setOtp(e.target.value)} sx={{marginTop:"10px",width:"300px"}} variant='outlined' size='small' label="Enter Otp"/>
      <br/>
      <Button onClick={verifyOtp} sx={{marginTop:"10px"}} variant='contained' color='success'>Verify otp</Button>
        </div>
     
    </div>
  )
}

export default PhoneSignin
