import React from 'react';
import "./index.css";
import logo from "../../../assets/hour-glass.gif"


function LogoTextComponent({text1, text2 }) {
  return (
    <>
    <div className="wrapper">
    <div className='popup'>
      <div className='leftSideLogo'>
      <img src={logo} alt="Logo" style={{ width: '100px', height: '100px' }} /> </div>

      <div className='rightSidetext'>
        <p>{text1}</p>
        <p>{text2}</p>
      </div>
    </div>
    </div>
    </>
  );
}

export default LogoTextComponent;