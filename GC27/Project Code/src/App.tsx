import React from 'react';
import {BrowserRouter as Router, Routes, Route} from 'react-router-dom'
import Home from './pages/Home';
import Search from './pages/Search';
import Watch from './pages/Watch';
import Navbar from './components/Navbar';

function App() {
  return (
    <Router>
      <Routes>
        <Route path='/' element={<Home/>} />
        <Route path='/search' element={<Search/>} />
        <Route path='/watch/:id' element={<Watch/>} />
        <Route path='/navbar' element={<Navbar/>} />
      </Routes>
    </Router>
  );
}

export default App;
