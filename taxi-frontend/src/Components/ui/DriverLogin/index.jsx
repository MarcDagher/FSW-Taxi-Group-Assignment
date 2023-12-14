import React from 'react';
import './index.css';

const PlaceholderComponent = ({ placeholder1, placeholder2, placeholder3, placeholder4, placeholder5 }) => {
  return (
    <>

          <div className="wrapper-1">
            <div className="left">
              <div className="header">
              <img src="public/logo2.svg" alt="logo" />
              <p>Profile Page</p>
              </div>
              <div className="input-column">
              <input type="text" placeholder={placeholder1} className="small-placeholder" />
              <input type="text" placeholder={placeholder2} className="small-placeholder" />
              <input type="text" placeholder={placeholder3} className="small-placeholder" />
              <input type="text" placeholder={placeholder4} className="small-placeholder" />
              <input type="text" placeholder={placeholder5} className="small-placeholder" />
            </div>
          </div>
          <div className="right"> </div>
         </div>

      

         
     
     
    </>
  );
};

export default PlaceholderComponent;