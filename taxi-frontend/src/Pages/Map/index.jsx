import React from 'react';
import GoogleApiWrapper from '../../components/Map/Maps';
import Header from "../../components/ui/header";
import './index.css'  
import MapCard from '../../components/Map/RideCard';

function MapPage() {
  return (
    <>
    <div className="container">
        <Header Title= {"Pickup Route map"}/> 
        <GoogleApiWrapper/>
    </div>
        <MapCard name={"Chahine Chahine"} location={"Dohat al hos"} destination={"baabda"} price={"23$"}/>
        </>
  );
}

export default MapPage;
