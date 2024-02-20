import './App.css';
import '../node_modules/bootstrap-dark-5/dist/css/bootstrap-dark.min.css'  //npm i bootstrap-dark-5 boostrap
import '../node_modules/bootstrap/dist/js/bootstrap.bundle';
import "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
import Home from './screens/Home';
import {
  BrowserRouter as Router,
  Routes,
  Route
} from "react-router-dom";
// import Navbar from './components/Navbar';
import Login from './screens/Login';
import Signup from './screens/signup.js';
import { CartProvider } from './components/ContextReducer';
import MyOrder from './screens/MyOrder';
import Aboutus from './screens/Aboutus.js';
import Contactus from './screens/Contactus.js';
import Payment from './screens/Payment.js';
import Mpayment from './screens/Mpayment.js';


function App() {
  return (
    <CartProvider>
      <Router>
        <div>
          <Routes>
            <Route exact path="/" element={<Home/>} />
            <Route exact path="/login" element={<Login />} />
            <Route exact path="/signup" element={<Signup />} />
            <Route exact path="/myorder" element={<MyOrder />} />
            <Route exact path="/aboutus" element={<Aboutus />} />
            <Route exact path="/contactus" element={<Contactus />} />
            <Route exact path="/payment" element={<Mpayment/>} />
          </Routes>
        </div>
      </Router>
    </CartProvider>
  );
}

export default App;
