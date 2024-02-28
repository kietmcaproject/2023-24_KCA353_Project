import logo from "../assets/1280.jpg";



function Home() {
    return (
      <div className='grid place-items-center text-richblack-100 text-3xl h-full'>
      <img src={logo} height={200} width={700} loading="lazy" alt="Logo" />
      </div>
    );
  }
  
  export default Home;