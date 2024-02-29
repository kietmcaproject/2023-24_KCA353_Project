import React ,{useEffect, useState}from 'react'
import Carousel from '../components/Carousel'
import Navbar from '../components/Navbar'
import Footer from '../components/Footer'
import Carousel1 from '../components/Carousel1'
import CardList from '../components/CardList'




export default function index() {
  const [src, setSrc] = useState('');
  const [dest, setDest] = useState('');
  const [packages, setPackages] = useState([]);

  useEffect(()=>{
    const token = document.cookie.replace(/(?:(?:^|.*;\s*)token\s*=\s*([^;]*).*$)|^.*$/, '$1');
    fetch('http://localhost:5000/packages', {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': token,
      },
    })
      .then((resp) => resp.json())
      .then((data) => {
       
        setPackages(data);
      });
  },[])
  const handleSearch = async (e) => {
    e.preventDefault();

    try {
      const token = document.cookie.replace(/(?:(?:^|.*;\s*)token\s*=\s*([^;]*).*$)|^.*$/, '$1');
      const res = await fetch(`http://localhost:5000/search-packages?src=${src}&dest=${dest}`, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': token,
          // Include authentication headers if needed  
        },
      });

      const data = await res.json();
      setPackages(data)
      console.log(data); // Log the response from the backend
      // Handle the received data as needed
    } catch (error) {
      console.error(error);
      // Handle error
    }
  };
  
  
  return (
    <div>
        <div><Navbar/></div>
     <div><div id="carouselExampleCaptions" className="carousel slide">
      <div className="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" className="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div className="carousel-inner">
        <div className="carousel-item active">
          <img src="https://source.unsplash.com/1600x500/?mountains" className="d-block w-100" alt="..." />
        </div>
        <div className="carousel-item">
          <img src="https://source.unsplash.com/1600x500/?lake" className="d-block w-100" alt="..." />
        </div>
        <div className="carousel-item">
          <img src="https://source.unsplash.com/1600x500/?goa" className="d-block w-100" alt="..." />
        </div>
        <div className='carousel-caption' style={{ "zIndex": "10" }}>
          <form className="d-flex position-absolute start-50 bottom-10 translate-middle"  role="search">
            <input
              className="form-control me-2"
              type="search"
              placeholder="Source"
              aria-label="Source"
              value={src}
              onChange={(e) => setSrc(e.target.value)}
            />
            <input
              className="form-control me-2"
              type="search"
              placeholder="Destination"
              aria-label="Destination"
              value={dest}
              onChange={(e) => setDest(e.target.value)}
            />
            <button
              style={{ justifyContent: "center" }}
              className="btn btn-outline-success text-white bg-warning"
              type="submit"
              onClick={handleSearch}
            >
              Search
            </button>
          </form>
        </div>
      </div>
      <button className="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span className="carousel-control-prev-icon" aria-hidden="true"></span>
        <span className="visually-hidden">Previous</span>
      </button>
      <button className="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span className="carousel-control-next-icon" aria-hidden="true"></span>
        <span className="visually-hidden">Next</span>
      </button>
    </div></div>
     <div className='m-5' style={{display:"flex",justifyContent:"center",alignItems:"center",paddingTop:"1px"}}><CardList packages={packages}/></div>
    
     <Footer/>
    </div>
  )
}
