import Button from "../ui/button";
import "./Card.css"



const RideCard =({request, name, location, destination, price}) =>{


    return (
        <div className="wrapper">
        <div className="cardContainer">
            <div className="righthalf">
                <p className="request">Request {request}</p>
                <p>{name}</p>
                <p>{location}</p>
                <p>{destination}</p>
            </div>
            <div className="lefthalf">
                <p>cost {price}</p>
                <Button>accept</Button>
            </div>
        </div>
        </div>
    );
}

export default RideCard;    