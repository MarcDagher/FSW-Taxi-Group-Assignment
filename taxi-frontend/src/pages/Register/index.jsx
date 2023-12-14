import { Link, useNavigate } from "react-router-dom";
import { useState } from "react";
import "./index.css";

import Form from "../../components/ui/form";
import Button from "../../components/ui/button";
import Header from "../../components/ui/header";

import sloganPng from "../../assets/sloganPng.png";

import { request } from "../../helpers/request_helper";

const Login = () => {
    const navigate = useNavigate();
    const [error, setError] = useState(null);
    const [credentials, setCredentials] = useState({
        email: "",
        password: "",
        first_name: "",
        last_name: "",
        role: "",
        img: "",
    });

    const handleChange = (e) => {
        setError(null);
        setCredentials((prevCreds) => {
            return { ...prevCreds, [e.target.name]: e.target.value };
        });
        console.log(credentials);
    };

    const handleSubmit = async () => {
        if (credentials.role == 3) {
            delete credentials.age;
            delete credentials.driver_license;
            const response = await request({
                body: credentials,
                route: "register",
                method: "POST",
            });
            if (response.data.status === "success") {
                return navigate("/login");
            } else {
                const { email, password, first_name, last_name } =
                    response.data.details;
                setError({
                    email: email,
                    password: password,
                    first_name: first_name,
                    last_name: last_name,
                });
                console.log(response);
                console.log("error");
            }
        } else {
            const response = await request({
                body: credentials,
                route: "createDriver",
                method: "POST",
            });
            if (response.data.status === "success") {
                return navigate("/DriverRequest");
            } else {
                const {
                    email,
                    password,
                    first_name,
                    last_name,
                    age,
                    driver_license,
                } = response.data.details;
                setError({
                    email: email,
                    password: password,
                    first_name: first_name,
                    last_name: last_name,
                    age: age,
                    driver_license: driver_license,
                });
                console.log(response);
                console.log("error");
            }
        }
    };

    return (
        <>
            <Header />
            <div className="auth">
                <div className="auth-left">
                    <Form title={"Join Us"}>
                        {error && error.email && (
                            <p className="form-error">{error.email}</p>
                        )}
                        <input
                            type="text"
                            name="email"
                            placeholder="Email"
                            onChange={handleChange}
                        />
                        {error && error.password && (
                            <p className="form-error">{error.password}</p>
                        )}
                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                            onChange={handleChange}
                        />

                        {error && error.first_name && (
                            <p className="form-error">{error.first_name}</p>
                        )}
                        {error && error.last_name && (
                            <p className="form-error">{error.last_name}</p>
                        )}

                        <div className="form-inner">
                            <input
                                type="text"
                                name="first_name"
                                placeholder="First Name"
                                onChange={handleChange}
                            />
                            <input
                                type="text"
                                name="last_name"
                                placeholder="Last Name"
                                onChange={handleChange}
                            />
                        </div>

                        <div className="form-inner">
                            <label htmlFor="img">Profile picture</label>
                            <input
                                type="file"
                                name="img"
                                id="img"
                                onChange={handleChange}
                            />
                        </div>

                        <select name="role" id="role" onChange={handleChange}>
                            <option value="null">Select your role</option>
                            <option value="3">Passenger</option>
                            <option value="2">Driver</option>
                        </select>

                        {credentials.role == 2 && (
                            <>
                                {error && error.age && (
                                    <p className="form-error">
                                        {error.last_name}
                                    </p>
                                )}
                                <input
                                    type="number"
                                    name="age"
                                    id="age"
                                    placeholder="Age (min:18)"
                                    min={18}
                                    onChange={handleChange}
                                />
                                {error && error.driver_license && (
                                    <p className="form-error">
                                        {error.driver_license}
                                    </p>
                                )}
                                <div className="form-inner">
                                    <label htmlFor="driver_license">
                                        Driver License
                                    </label>
                                    <input
                                        type="file"
                                        name="driver_license"
                                        id="driver_license"
                                        onChange={handleChange}
                                    />
                                </div>
                            </>
                        )}
                        <p className="form-small">
                            Already have an account?{" "}
                            <span>
                                <Link to={"/login"}>Login</Link>
                            </span>
                        </p>

                        <div onClick={handleSubmit}>
                            <Button>Register Account</Button>
                        </div>
                    </Form>
                </div>
                <div className="auth-right">
                    <img src={sloganPng} alt="" />
                </div>
            </div>
        </>
    );
};

export default Login;
