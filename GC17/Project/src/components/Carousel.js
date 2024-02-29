import React from 'react'

export default function Carousel() {
  return (
    <div className=' '>
      <div id="carouselExampleFade " className="carousel slide carousel-fade" data-bs-ride="carousel" style={{"objectFit":"contain !important"}}>
  <div className="carousel-inner " id='carousel'>
  <div className='carousel-caption' style={{"zIndex":"10"}}>
  <form className="d-flex " role="search">
      <input className="form-control me-2 start-20 bottom-20 end-20 position-absolute " type="search" placeholder="Source" aria-label="Search"/>
      <input className="form-control me-2 start-20 bottom-100 end-50 position-absolute  " type="search" placeholder="Destination" aria-label="Search"/>
      <button className="btn btn-outline-success text-white bg-warning   bottom-0 end-0 position-absolute" type="submit">Search</button>
    </form>
  </div>
    <div className="carousel-item active">
      <img src="https://source.unsplash.com/1600x500/?hills" className="d-block w-100" alt="..." style={{"filter":"brightness(30%)"}}/>
    </div>
    <div className="carousel-item">
      <img src="https://source.unsplash.com/1600x500/?beach" className="d-block w-100" alt="..." style={{"filter":"brightness(30%)"}}/>
    </div>
    <div className="carousel-item">
      <img src="https://source.unsplash.com/1600x500/?lake" className="d-block w-100" alt="..."  style={{"filter":"brightness(30%)"}}/>
    </div>
  </div>
  <button className="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span className="carousel-control-prev-icon" aria-hidden="true"></span>
    <span className="visually-hidden">Previous</span>
  </button>
  <button className="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span className="carousel-control-next-icon" aria-hidden="true"></span>
    <span className="visually-hidden">Next</span>
  </button>
</div>
    </div>
  )
}
