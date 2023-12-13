/* eslint-disable no-unused-vars */
import { useState } from "react";
import Button from "./components/ui/button";
import Header from "./components/ui/header";
import Home from "./pages/Home";
import Admin from "./pages/Admin";
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import PassengerDashboard from "./pages/Passenger Dashboard";
import Chatting from "./pages/Chatting";

function App() {
  return (
    <BrowserRouter>
      <Routes> 
        <Route path="/" index element={<Home />} />
        <Route path="/admin" index element={<Admin />} />
        <Route path="*" element={<>404 page not found</>} />
        <Route path="/PassengerDashboard" element={<PassengerDashboard />} />
        <Route path="/Chat" element={<Chatting />}/>
      </Routes>
    </BrowserRouter>
  )
}

export default App;