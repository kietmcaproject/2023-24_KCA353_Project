import React from 'react'

export default function Card({ src, dest, price, desc }) {
    return (
        <div className='flex flex-col'>
            <div className='flex flex-row'>
                <div className='text-lg'>Source</div>
                <div className='text-lg'>{src}</div>
            </div>
            <div className='flex flex-row'>
                <div className='text-lg'>Destination</div>
                <div className='text-lg'>{dest}</div>
            </div>
            <div className='flex flex-row'>
                <div className='text-lg'>Price</div>
                <div className='text-lg'>{price}</div>
            </div>
            <div className='flex flex-row'>
                <div className='text-lg'>description</div>
                <div className='text-lg'>{desc}</div>
            </div>

        </div>
    )
}
