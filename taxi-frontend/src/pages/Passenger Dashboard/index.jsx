import "./index.css"
import Header from "../../components/ui/header"
import Button from "../../components/ui/button"
import request from "../../helpers/request_helper"
import { useState } from "react"
import { useNavigate } from "react-router-dom"

const PassengerDashboard = () => {

const token = localStorage.getItem('token')  

const [requestError, setRequestError] = useState(false)
const navigate = useNavigate()
if (!token){
  navigate("/error")
}
const [formData, setFormData] = useState({ 
  pickup_location : "", 
  destination_location : "",
})

const handleChange = (name, value) => {
    setFormData((previous)=> {return {...previous, [name] : value}})
}


const handleSubmit = async () => {

  const response = await request({
      body: {...formData},
      route: "request_ride",
      method: "POST",
      token: token})

  if (response.data.status == "success"){
    setRequestError(false)
    navigate("/PassengerRequest")
  } else if (response.data.status == "failed"){
     setRequestError(true)
  }
}

  return <>
  <div className="wrapper">
    <Header />
      <div className="box">
        <div className="inputs-col">
          <div className="text-col">
            <p>Taxina</p>
            <p>Book a Ride</p>
          </div>
          <div className="input-container">
              {requestError && <p className="request_error">Ride already exists!</p>}
              <input type="text" name="pickup_location" placeholder="Pickup" onChange={(e) => handleChange("pickup_location", e.target.value)}/>
              <input type="text" name="destintion" placeholder="Destination" onChange={(e) => handleChange("destination_location", e.target.value)}/>
          </div>
        </div>
          <div onClick={handleSubmit}><Button>Request</Button></div>
    </div>
  </div>
  </>
}

export default PassengerDashboard