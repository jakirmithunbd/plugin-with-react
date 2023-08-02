import React from 'react'
import { FaBeer } from 'react-icons/fa';
import Nav from './Nav';
import { Routes, Route, Link } from "react-router-dom";
import Settings from '../Settings';
import Tayphography from '../Tayphography';


const Header = () => {
  return (
    <div className='app'>
        <h1>Corporatemeta Cookie Plugin</h1>
        {/* <div className='nav-menu'>
            <div className='menu-item active'>Settings</div>
            <div className='menu-item'>Integrations Manager</div>
            <div className='menu-item'>Data Control</div>
            <div className='menu-item'>Design</div>
            <div className='menu-item'>Own texts</div>
        </div>
        
        <Routes>
            <Route path="/settings" component={<Settings />} />
            <Route path="/typhography" component={<Tayphography />} />
        </Routes> */}
    </div>
  )
}

export default Header