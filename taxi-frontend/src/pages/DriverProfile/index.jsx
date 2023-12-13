import HeaderHome from "../../components/ui/header";
import logo from "../../assets/4.png"

function DrivereLogin(){
    return (
        <>
        <PlaceholderComponent
        placeholder1="Driver name"
        placeholder2="Last name"
        placeholder3="Age"
        placeholder4="Email"
        placeholder5="Password"
        className="custom-class"
        style={customStyle}
      />
      </>
    )
}
export default DrivereLogin;