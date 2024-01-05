/* eslint-disable no-unused-vars */
import Home from "./pages/Home";
import Admin from "./pages/Admin";
import Register from "./pages/Register";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import PassengerDashboard from "./pages/Passenger Dashboard";
import Login from "./pages/Login";
import MapPage from "./pages/Map";
import ErrorPage from "./pages/Error";
import RidesList from "./pages/Driver";
import DriverRequest from './Pages/DriverRequest'
import PassengerRequest from "./pages/PassengerRequest";
import "./App.css";

function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" index element={<Home />} />
                <Route path="/admin"  element={<Admin />} />
                <Route path="/login" element={<Login />} />
                <Route path="/register" element={<Register />} />
                <Route path="/DriverRequest" element={<DriverRequest/>} />
                <Route path="/PassengerRequest" element={<PassengerRequest/>} />
                <Route path="/map" element={<MapPage />} />
                <Route path="/DriverHomePage" element={<RidesList />} />
                <Route path="/passengerdashboard" element={<PassengerDashboard/>}/>
                <Route path="*" element={<ErrorPage/>}/>
            </Routes>
        </BrowserRouter>
    );
}

export default App;
