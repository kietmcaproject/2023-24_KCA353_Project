import React, { useEffect, useReducer, useState } from 'react'
import Navbar from './Navbar'
import { useLocation } from 'react-router-dom'
import "./Chat.css"
import clip from "../images/clip.png"
import { addDoc, collection, doc, getDocs } from 'firebase/firestore'
import { auth, database } from '../firebase/setup'
import send from "../images/send.png"
import { List, ListItem, ListItemText, Paper } from '@mui/material'

function Chat() {
  
  const fileRef = useReducer(null)

  const [message,setMessage] = useState("")
  const [messageData,setMessageData] = useState([])
  const [file,setFile] = useState("")

  const location = useLocation()

  const addMessage = async()=>{
    const userDoc = doc(database,"Users",`${auth.currentUser?.uid}`)
    const messageDoc = doc(userDoc,"Message",`${auth.currentUser?.uid}`)
    const messageRef = collection(messageDoc,`Message-${location.state.id}`)
    try{
      await addDoc(messageRef,{
         message:message,
         file:file
      })
    }catch(err){
      console.error(err)
    }
  }

  const sendMessage = async()=>{
    const userDoc = doc(database,"Users",`${location.state.id}`)
    const messageDoc = doc(userDoc,"Message",`${location.state.id}`)
    const messageRef = collection(messageDoc,`Message-${auth.currentUser?.uid}`)
    try{
      await addDoc(messageRef,{
         message:message,
         file:file,
         name:auth.currentUser?.displayName
      })
      addMessage()
      setFile("")
    }catch(err){
      console.error(err)
    }
  }

  const showMessage = async()=>{
    const userDoc = doc(database,"Users",`${auth.currentUser?.uid}`)
    const messageDoc = doc(userDoc,"Message",`${auth.currentUser?.uid}`)
    const messageRef = collection(messageDoc,`Message-${location.state.id}`)
    setTimeout(async()=>{
      try{
        const data = await getDocs(messageRef)
        const filteredData = data.docs.map((doc)=>({
          ...doc.data(),
          id:doc.id
        }))
        setMessageData(filteredData)
       }catch(err){
         console.error(err)
       }
    },1000)
   
  }


  useEffect(()=>{
    showMessage()
  },[messageData])


  return (
    <div className='chat'>
      <div className='chat-top'>
      <Navbar recieverUsername={location.state.username} 
      recieverProImg = {location.state.profile_image}/>
      </div>
      <div className='chat-middle'>
        {messageData.map((data)=>{
          return <>
          <h5 style={{fontWeight:"200"}}>{data.name}</h5>
           <Paper sx={{marginTop:"10px",width:"max-content"}}>
            <List>
              <ListItem>
                <ListItemText primary={data.message}/>
                {data.file !== "" && <img style={{width:"200px"}} src={data.file}/>}
              </ListItem>
            </List>
           </Paper>
          </>
        })}
      </div>
      <div className='chat-bottom'>
        <img onClick={()=> fileRef.current.click()} className='chat-bottom-icon' src={clip}/>
        <input accept='image/*' onChange={(e)=> setFile(URL.createObjectURL(e.target.files[0]))} ref={fileRef} type='file' className='file'/>
        <input onChange={(e)=> setMessage(e.target.value)} className='chat-text' placeholder='Type a message'/>
        {file && <Paper>
          <img style={{width:"70px",padding:"3px"}} src={file}/>
        </Paper>}
        <img onClick={sendMessage} src={send} className='send-icon'/>
      </div>
    </div>
  )
}

export default Chat
