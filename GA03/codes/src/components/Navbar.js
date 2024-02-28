import * as React from 'react';
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import {auth} from "../firebase/setup"
import "./Navbar.css"
import out from "../images/out.png"
import { signOut } from 'firebase/auth';
import { useNavigate } from 'react-router-dom';

export default function Navbar(props) {
  
  const navigate = useNavigate()

  const logout = async()=>{
    try{
      await signOut(auth)
      navigate("/")
    }catch(err){
      console.error(err)
    }
  }

  console.log(auth.currentUser)


  return (
    <Box sx={{ flexGrow: 1 }}>
      <AppBar elevation={0} sx={{backgroundColor:"#E9E9E9",height:"70px"}} position="static">
        <Toolbar variant="dense">
            <img   className='profile-img' src={props.recieverProImg ?? auth.currentUser?.photoURL}/>
            <h3 className='reciever-name'>{props.recieverUsername ?? ""}</h3>
            <img style={{marginLeft:"10px"}} onClick={logout} className='logout-icon' src={out}/>
        </Toolbar>
      </AppBar>
    </Box>
  );
}
