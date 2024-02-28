import { Grid } from '@mui/material'
import React from 'react'
import Navbar from './Navbar'
import Sidebar from './Sidebar'
import "./Main.css"
import smartphone from "../images/smartphone.png"

function Main() {
  return (
    <div>
      <Grid container>
        <Grid item xs={12}>
          <Navbar/>
        </Grid>
        <Grid item xs={5}>
          <Sidebar/>
        </Grid>
        <Grid item xs={7}>
          <div className='main-right'>
            <img className='right-image' src={smartphone}/>
            <h1 className='right-text'>Whatschat web for desktop</h1>
            <h4  className='right-text'>Keep your computer connected</h4>
          </div>
        </Grid>
      </Grid>
    </div>
  )
}

export default Main
