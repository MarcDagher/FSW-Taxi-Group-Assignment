import './index.css'

const Header = () => {
  
  return <header>
    <div className="mini-logo">
        <img src="public/logo2.svg" alt="logo"/>
    </div>
    <div className="links-row">
      <p>Home</p>
      <p>Profile</p>
      <div className='profile-pic'>
        <img src="public/profile-placeholder.svg" alt="profile pic" />
      </div>
    </div>
  </header>
}

export default Header