import { useState } from 'react'
import './index.css'

const Header = () => {
  const [isExpanded, setIsExpanded] = useState(false)

  const handleClick = () =>{
    setIsExpanded(!isExpanded)
  }
  
  return <header>
    <div className={isExpanded?'hamburger-list active-list':'hamburger-list'} onClick={handleClick}>
      <span></span>
      <span></span>
      <span></span>
    </div>

    <div className='profile-pic'>
      <img src="public/profile-placeholder.svg" alt="profile pic" />
    </div>
  </header>
}

export default Header