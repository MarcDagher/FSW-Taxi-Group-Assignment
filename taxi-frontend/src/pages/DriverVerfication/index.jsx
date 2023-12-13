import HeaderHome from "../../components/ui/header";
import LogoTextComponent from "../../components/ui/popup";

function DriverVerification(){
    return (
 
        <div>
        <HeaderHome/>
        <LogoTextComponent text1={"Currently Your profile is under review by admin"} text2={"We’ll contact you soon" }/> 
        </div>
    )
}
export default DriverVerification;