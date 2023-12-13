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
import "./App.css";

function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" index element={<Home />} />
                <Route path="/admin" index element={<Admin />} />
                <Route path="/login" index element={<Login />} />
                <Route path="/register" index element={<Register />} />
                <Route
                    path="/PassengerDashboard"
                    element={<PassengerDashboard />}
                />
                <Route path="/map" element={<MapPage />} />
                <Route path="/error" element={<ErrorPage />} />
                <Route path="/DriverHomePage" element={<RidesList />} />
            </Routes>
        </BrowserRouter>
    );
}

export default App;
