import React,{useState} from 'react'
import axios from 'axios';
import "./styleBack.css";

export default function AddPackages() {
  const [formData, setFormData] = useState({
    src: '',
    dest: '',
    description: '',
    price: 0,
  });

  // Define authToken here or get it from your authentication context/state
  const token = document.cookie.replace(/(?:(?:^|.*;\s*)token\s*=\s*([^;]*).*$)|^.*$/, '$1');

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({
      ...prevData,
      [name]: value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const headers = {
        'Content-Type': 'application/json',
        'Authorization': token,
      };
      await axios.post('http://localhost:5000/create-package', formData, { headers });

      setFormData({
        src: '',
        dest: '',
        description: '',
        price: 0,
      });
    } catch (error) {
      console.error('Error submitting package:', error);
      // Handle error as needed
    }
  };
  
  return (
    <div className='containerBack' >
      <div className="container mx-auto mt-8 p-8 bg-white rounded shadow-md max-w-md">
      {/* Limiting the width of the container to a maximum of medium (md) width */}

      <h1 className="text-2xl font-semibold mb-6">Add Package</h1>

      {/* Form to add a new package */}
      <form onSubmit={handleSubmit}>
       
        <div className="mb-4">
          <label htmlFor="src" className="block text-gray-700 text-sm font-bold mb-2">
            Source:
          </label>
          <input
            type="text"
            id="src"
            name="src"
            className="w-full p-2 border rounded"
            value={formData.src}
            onChange={handleChange}
            required
          />
        </div>

        {/* Destination */}
        <div className="mb-4">
          <label htmlFor="dest" className="block text-gray-700 text-sm font-bold mb-2">
            Destination:
          </label>
          <input
            type="text"
            id="dest"
            name="dest"
            className="w-full p-2 border rounded"
            value={formData.dest}
            onChange={handleChange}
            required
          />
        </div>

        {/* Description */}
        <div className="mb-4">
          <label htmlFor="description" className="block text-gray-700 text-sm font-bold mb-2">
            Description:
          </label>
          <textarea
            id="description"
            name="description"
            className="w-full p-2 border rounded"
            value={formData.description}
            onChange={handleChange}
            required
          ></textarea>
        </div>

        {/* Price */}
        <div className="mb-4">
          <label htmlFor="price" className="block text-gray-700 text-sm font-bold mb-2">
            Price:
          </label>
          <input
            type="number"
            id="price"
            name="price"
            className="w-full p-2 border rounded"
            value={formData.price}
            onChange={handleChange}
            required
          />
        </div>

        {/* Submit Button */}
        <button type="submit" className="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">
          Add Package
        </button>
      </form>
    </div>
    </div>
  )
}
