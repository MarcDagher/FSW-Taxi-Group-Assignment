import React from "react";
import HeaderHome from "../../components/ui/header";
import arrow from "../../assets/arrow.svg"
import logo from "../../assets/sloganPng.png"
import Button from "../../components/ui/button";
import './index.css';


function Home(){

    return (
      <>
      <HeaderHome/>
      <div className="homePage">

        <div className="homeBody">

          <div className="leftSide">
          <h1 className="home-title">Taxina</h1>
          <p className="home-desc">Explore all of Lebanon, anytime in affordable prices.</p>
          </div>

          <div className="rightSide">
            <img src={logo} alt="" className="image" />
          </div>

        </div>

        </div>
        <div className="buttonBody">
       <Button ><a href="/login">Create Account</a></Button>
        </div>
        <div className="arrowDown">
          <img src={arrow} alt="" width={40} />
          <img src={arrow} alt="" width={40} />
        </div>
      </>
    )
}

export default Home;