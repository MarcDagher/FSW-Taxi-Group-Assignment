import Header from "../../components/ui/header";
import WelcomeDriver from "../../components/Driver/Welcome";
import RideCard from "../../components/Common/card";


function RidesList(){


    return(
        <>
        <Header/>
        <WelcomeDriver welcome={"Chahine"}/>
        <RideCard request={12} name = {"Rony"} location = {"Beirut hamra"} destination = {"BDD"} price = {"8$"}/>
        <RideCard request={13} name = {"Chahine"} location = {"Doha"} destination = {"BDD"} price = {"15$"}/>
        <RideCard request={14} name = {"Rawad"} location = {"Baalback"} destination = {"BDD"} price = {"60$"}/>
        <RideCard request={15} name = {"Marc"} location = {"ajaalton"} destination = {"BDD"} price = {"60$"}/>
        </> 
    );
}

export default RidesList;