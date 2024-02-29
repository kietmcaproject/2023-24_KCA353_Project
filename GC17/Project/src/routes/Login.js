import React, { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../Context/AuthContext';
import { Link } from 'react-router-dom';

  
// Define the Login component
const Login = () => {
  // State variables to store username and password
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  
  const { authToken, login } = useAuth();
  const navigate=useNavigate();
  // Event handler for form submission
  const handleLogin = async (e) => {
    e.preventDefault();
    
    // Prepare data to be sent in the request body
    const data = {
      username: username,
      password: password,
    };

    try {
      // Send a POST request to the server
     
      const response = await axios.post('http://localhost:5000/login', data);
      
     
      // Check if response.data is defined before accessing it
      if (response && response.data) {
        login(response.data.token);
        document.cookie = `token=${response.data.token}`;
        // Handle the response as needed (e.g., redirect on success)
        console.log('Login successful');
        navigate('/index');
      } else {
        // Handle the case where response.data is undefined
        console.error('Login failed. Response data is undefined.');
      }
    } catch (error) {
      // Handle errors (e.g., display an error message)
      console.error('Login failed', error.response ? error.response.data : error.message);
    }
  };


  return (
    <div className='background'>
    <section className="bg-gray-50">
  <div className="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <a href="#" className="flex items-center mb-6 text-2xl font-semibold text-gray-900">
      Login
    </a>
    <div className="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0  dark:border-gray-700">
      <div className="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 className="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
          Sign in to your account
        </h1>
        <form onSubmit={handleLogin} className="space-y-4 md:space-y-6" action="#">
       
          <div>
            <label for="username" className="block mb-2 text-sm font-medium text-gray-900">Username</label>
            <input type="text" value={username} onChange={(e) => setUsername(e.target.value)} name="username" id="username" className="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" />
          </div>
          <div>
            <label for="password" className="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input value={password} onChange={(e) => setPassword(e.target.value)} type="password" name="password" id="password" placeholder="••••••••" className="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="" />
          </div>
          <div>
           
           
          </div>
          <div className="flex items-center justify-between">
            <div className="flex items-start">
              <div className="flex items-center h-5">
                <input id="remember" aria-describedby="remember" type="checkbox" className="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required="" />
              </div>
              <div className="ml-3 text-sm">
                <label for="remember" className="text-gray-500">Remember me</label>
              </div>
            </div>
            <a href="#" className="text-sm font-medium text-primary-600 hover:underline">Forgot password?</a>
          </div>
          <button type="submit" className="w-full  text-white bg-black hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
          <p className="text-sm font-light text-gray-500">
            Don’t have an account yet? <a href="#" className="font-medium text-primary-600 hover:underline"><Link className="" to="/createuser">Signup</Link></a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>
</div>

  );
};

// Export the Login component
export default Login;