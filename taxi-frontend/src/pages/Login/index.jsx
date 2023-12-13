import { useState } from "react";
import { Link } from "react-router-dom";

import "./index.css";

import Header from "../../components/ui/header";

import Form from "../../components/ui/form";
import Button from "../../components/ui/button";

const Login = () => {
    const [credentials, setCredentials] = useState({
        email: "",
        password: "",
    });

    const [isEmailValid, setIsEmailValid] = useState(false);

    const validateEmail = (email) => {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    };

    const showEmailError = (message) => {
        document.getElementById("email").innerHTML = message;
    }
    const handleChange = (e) => {
        if (e.target.type === "email") {
            setIsEmailValid(validateEmail(e.target.value));
        }

        setCredentials((prevCreds) => {
            return { ...prevCreds, [e.target.name]: e.target.value };
        });
    };

    const handleSubmit = () => {
        if (!isEmailValid) {
            alert('Invalid Email')
        }

        //TODO Axios adding
    };
    return (
        <>
            <Header/>
            <div className="auth">
                <Form title={"Welcome Back!"} buttonText={"Log in"}>
                    <input
                        type="text"
                        placeholder="Email"
                        id="email"
                        onChange={handleChange}
                    />
                    <input
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
