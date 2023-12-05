import React from 'react'
//import {BsPersonCircle, BsCart} from 'react-icon/bs'

function Header() {
  return (
    <body>
        <div className='header'>
            <div className='header-left'>
                <h3>CALISTO MEDILAB</h3>
            </div>  
            <div className='header-right'>
                <p>Cart</p>
                <p>Profile</p>
                {/* <BsPersonCircle className='icon'/>
                <BsCart className='icon'/>                 */}
            </div>  
        </div>
        <div className='navbar'>
            <div className='navbar-left'>
                <h5>Categories</h5>
            </div>  
            <div className='navbar-center'>
                <h5>Home</h5>
                <h5>Menu</h5>
                <h5>Our Services</h5>
                <h5>Contact Us</h5>
                <h5>About Us</h5>
                <h5>Testimonial</h5>
            </div>
            <div className='navbar-right'>
                <h5>Search</h5>
                {/* <BsPersonCircle className='icon'/>
                <BsCart className='icon'/>                 */}
            </div>  
        </div>
    </body>
  )
}

export default Header