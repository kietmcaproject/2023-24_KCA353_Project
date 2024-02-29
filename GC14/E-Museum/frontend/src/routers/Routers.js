// import React from 'react';
// import {Routes, Route, Navigate} from 'react-router-dom';

// import Home from '../pages/Home';
// import Tours from '../pages/Home';
// import TourDeatils from '../pages/Home';
// import Login from '../pages/Home';
// import Register from '../pages/Home';
// import SearchResultList from '../pages/Home';

// const Routers = () => {
//   return (
//     <Routes>
//         <Route path = "/" element = {<Navigate to ='/home'/>} />
//         <Route path = "/Home" element = {<Home/>} />
//         <Route path = "/tours" element = {<Tours/>} />
//         <Route path = "/tours/:id" element = {<TourDeatils/>} />
//         <Route path = "/register" element = {<Register/>} />
//         <Route path = "/login" element = {<Login/>} />
//         <Route path = "/tours/seacrh" element = {<SearchResultList/>} />
//     </Routes>
//   );
// };

// export default Routers;

import React from 'react';
import {Routes, Route, Navigate} from 'react-router-dom';

import Home from "./../pages/Home";
import Tours from './../pages/Tour';
import TourDeatils from './../pages/TourDeatils';
import Login from './../pages/Login';
import Register from './../pages/Register';
import SearchResultList from './../pages/SearchResultList';



const Routers = () => {
  return (
      <Routes>
        <Route path = "/" element = {<Navigate to ='/home'/>} />
        <Route path = "/Home" element = {<Home/>} />
        <Route path = "/tours" element = {<Tours/>} />
        <Route path = "/tours/:id" element = {<TourDeatils/>} />
        <Route path = "/register" element = {<Register/>} />
        <Route path = "/login" element = {<Login/>} />
        <Route path = "/tours/seacrh" element = {<SearchResultList/>} />
      </Routes>
  );
};

export default Routers;