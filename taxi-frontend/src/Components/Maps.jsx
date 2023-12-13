import React, { Component } from 'react';
import { Map, Marker, GoogleApiWrapper } from 'google-maps-react';

class GoogleMap extends Component {
  render() {
    const mapStyles = {
      width: '1200px', 
      height: '700px',
      margin: 'auto',
      transform: 'translateY(-50px)',
    };

    return (
      <Map
        google={this.props.google}
        zoom={11}
        initialCenter={{ lat: 33.8938, lng: 35.5018 }}
        style={mapStyles} 
      >
        <Marker position={{ lat: 33.8938, lng: 35.5018 }} label="Driver" />
        <Marker position={{ lat: 34.1238, lng: 35.6515 }} label="Passenger" />
      </Map>
    );
  }
}

export default GoogleApiWrapper({
  apiKey: 'AIzaSyD0T9fNeXRzg6FTLWyJ0qjbAWWuMUt34Ew',
})(GoogleMap);
