import Button from '../../components/ui/button';



const MapCard = ({name , location , destination , price}) => {


    return (
        <div className="card-wrapper">
        <div className="text-wrapper">
          <p className='text'>{name}</p>
          <p className='text'>{location}</p>
          <p className='text'>{destination}</p>
        </div>
        <div className="right-half">
          <p className='price'>Price: {price}</p>
        <Button isSecondary={true}>Full Screen</Button>
        </div>
        </div>
    );
    
}

export default MapCard;