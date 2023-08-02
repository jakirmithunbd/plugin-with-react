import React from 'react'
import { Routes, Route, Link } from 'react-router-dom'
import Settings from '../Settings'


const Nav = () => {
  return (
      <nav className='nav-menu'>
        <ul>
            <li>
                <Link to='/settings'>Settings</Link>
                <Link to='/typhography'>Typefo</Link>
            </li>
        </ul>
      </nav>
  )
}

export default Nav