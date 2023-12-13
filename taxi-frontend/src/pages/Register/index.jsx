import { Link } from "react-router-dom";
import { useState } from "react";
import "./index.css";

import Form from "../../components/ui/form";
import Button from "../../components/ui/button";
import Header from "../../components/ui/header";

import sloganPng from "../../assets/slogan.png";

const Login = () => {
    const [credentials, setCredentials] = useState({
        email: "",
        password: "",
        firstname: "",
        lastname: "",
        role: "",
        img: "",
    });

    const handleChange = (e) => {
        setCredentials((prevCreds) => {
            return { ...prevCreds, [e.target.name]: e.target.value };
        });
        console.log(credentials)
    };

    const handleSubmit = () => {
        console.log("works");
    };

    return (
        <>
            <Header />
            <div className="auth">
                <div className="auth-left">
                    <Form title={"Join Us"}>
                        <input
                            type="text"
                            name="email"
                            placeholder="Email"
                            onChange={handleChange}
                        />

                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                            onChange={handleChange}
                        />

                        <div className="form-inner">
                            <input
                                type="text"
                                name="firstname"
                                placeholder="First Name"
                                onChange={handleChange}
                            />
                            <input
                                type="text"
                                name="lastname"
                                placeholder="Last Name"
                                onChange={handleChange}
                            />
                        </div>

                        <div className="form-inner">
                            <label htmlFor="img">Profile picture</label>
                            <input type="file" name="img" id="img" onChange={handleChange}/>
                        </div>

                        <select name="role" id="role" onChange={handleChange}>
                            <option value="null">Select your role</option>
                            <option value="3">Passenger</option>
                            <option value="2">Driver</option>
                        </select>

                        {credentials.role == 2 && (
                            <>
                                <input
                                    type="number"
                                    name="age"
                                    id="age"
                                    placeholder="Age (min:18)"
                                    min={18}
                                    onChange={handleChange}
                                />
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
