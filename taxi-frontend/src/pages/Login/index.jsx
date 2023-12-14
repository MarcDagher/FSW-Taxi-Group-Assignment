import { useState } from "react";
import { Link, useNavigate } from "react-router-dom";

import "./index.css";

import Header from "../../components/ui/header";
import Form from "../../components/ui/form";
import Button from "../../components/ui/button";

import { request } from "../../helpers/request_helper";

const Login = () => {
    const navigate = useNavigate();
    const [credentials, setCredentials] = useState({
        email: "",
        password: "",
    });
    const [showError, setShowError] = useState(null);

    const handleChange = (e) => {
        setShowError(false);
        setCredentials((prevCreds) => {
            return { ...prevCreds, [e.target.name]: e.target.value };
        });
    };

    const handleSubmit = async () => {
        let response = await request({
            body: credentials,
            route: "login",
            method: "POST",
        });
        if (response.data.status === "success") {
            localStorage.setItem("token", response.data.authorisation.token);
            return navigate("/passengerDashboard");
        } 

        else {
            setShowError(response.data.message);
            console.log(response.data)
        }
    };

    return (
        <>
            <Header />
            <div className="auth">
                <Form title={"Welcome Back!"} buttonText={"Log in"}>
                    {showError && (
                        <p className="form-error">{showError}</p>
                    )}
                    <input
                        name="email"
                        type="email"
                        placeholder="Email"
                        id="email"
                        onChange={handleChange}
                    />
                    <input
                        name="password"
                        type="password"
                        placeholder="Password"
                        id="password"
                        onChange={handleChange}
                    />
                    <p className="form-small">
                        Don{"'"}t have an account?{" "}
                        <span>
                            <Link to={"/register"}>Register</Link>
                        </span>
                    </p>
                    <div onClick={handleSubmit}>
                        <Button>Login</Button>
                    </div>
                </Form>
            </div>
        </>
    );
};

export default Login;
