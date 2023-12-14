import React from "react";
import PlaceholderComponent from "../../components/ui/DriverLogin";
import './index.css'; 

function DrivereLogin(){
    return (
        <>
        <PlaceholderComponent  placeholder1="Driver name"  placeholder2="Last name"  placeholder3="Age" placeholder4="Email"  placeholder5="Password"  className="custom-class"/>
      </>
    )
}
export default DrivereLogin;