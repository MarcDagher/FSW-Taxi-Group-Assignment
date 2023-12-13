import React from 'react';
import GoogleApiWrapper from '../../components/Maps';
import Header from "../../components/ui/header";
import Button from '../../components/ui/button';
import './index.css'  

function MapPage() {
  return (
    <>
    <div className="container">
        <Header Title= {"Pickup Route map"}/> 
        <GoogleApiWrapper/>
    </div>
        <div className="card-wrapper">
        <div className="text-wrapper">
          <p className='text'>Chahine Chahine</p>
          <p className='text'>Hilton Toronto</p>
          <p className='text'>Acheive - China town</p>
        </div>
        <div className="right-half">
          <p className='price'>Price: 32$</p>
        <Button isSecondary={true}>Full Screen</Button>
        </div>
        </div>
        </>
  );
}

export default MapPage;
