import React from 'react'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faFacebook, faTwitter, faLinkedin, faInstagram, faYoutube } from '@fortawesome/free-brands-svg-icons';

const Footer = () => {
  return (
    <>
      <div className='bg-black w-[100%] m-[auto] p-5 mt-3'>

        <div className='w-[30%] m-[auto] grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-2'>

          <div className="rounded-full   w-[35%] border-2 border-black-600 border-white">

            <a href="#"><FontAwesomeIcon icon={faFacebook} color='white' /></a>
          </div>

          <div className="rounded-full   w-[35%] border-2 border-black-600 border-white">
            <a href="https://twitter.com/Walk_with_mohan"><FontAwesomeIcon icon={faTwitter} color='white' /></a>
          </div>

          <div className="rounded-full   w-[35%] border-2 border-black-600 border-white">
            <a href="https://www.linkedin.com/in/manmohan-dwivedi/"><FontAwesomeIcon icon={faLinkedin} style={{ width: "100%" }} color='white' /></a>
          </div>

          <div className="rounded-full   w-[35%] border-2 border-black-600 border-white">
            <a href="https://www.instagram.com/walk_with_mohan/"><FontAwesomeIcon icon={faInstagram} color='white' /></a>
          </div>

          <div className="rounded-full   w-[35%] border-2 border-black-600 border-white">
            <a href="https://www.youtube.com/channel/UChPI4urCupjtPfNQe-4n_IA"><FontAwesomeIcon icon={faYoutube} color='white' /></a>
          </div>

        </div>

        <div className='w-[30%] m-[auto] mt-2'>
          <p className='text-white m-[2%]'>Terms & Conditions   |    Privacy Policy</p>
          <p className='text-white'>2023 © MockMaster</p>
        </div>

      </div>
    </>
  )
}

export default Footer