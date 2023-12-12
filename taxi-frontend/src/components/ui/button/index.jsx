/* eslint-disable react/prop-types */
import "./index.css";

const Button = (props = {isSecondary:false}) => {
    return <button className={props.isSecondary ? 'btn-secondary' : 'btn-primary' }>{props.children}</button>;
};

export default Button;
