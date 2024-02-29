import React from 'react'

import Header from '../Header/Header';
import Footer from '../Footer/footer';
import Routers from '../../routers/Routers';

const Layout = () => {
  return <>  
    <Header/>
    <Routers/>
    <Footer/>
  </>  
};

export default Layout;