import "./index.css";
import { Link } from "react-router-dom";

const Header = ({ Title }) => {
  return (
    <header>
      <div className="mini-logo">
        <Link to="/">
          <img src="public/logo2.svg" alt="logo" />
        </Link>
      </div>
      <div className="title">{Title}</div>
      <div className="links-row">
        <a href="/">Home</a>
        <a href="/">Profile</a>
        <div className="profile-pic">
          <img src="public/profile.svg" alt="profile pic" />
        </div>
      </div>
    </header>
  );
};

export default Header;
