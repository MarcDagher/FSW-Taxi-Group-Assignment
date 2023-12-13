import HeaderHome from "../../components/ui/header";
import LogoTextComponent from "../../components/ui/popup";

function PassengerRequest(){
    return (
 
        <div>
        <HeaderHome/>
        <LogoTextComponent text1={"Request is sent, waiting for a driver to accept"} text2={"Estimated wait time: 5-10mins" }/> 
        </div>
    )
}
export default PassengerRequest;