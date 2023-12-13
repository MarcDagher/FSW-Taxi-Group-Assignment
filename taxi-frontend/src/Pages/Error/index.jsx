import Button from "../../components/ui/button";
import Header from "../../components/ui/header";
import './index.css'


function ErrorPage(){


    return (
        <>
    <Header/>
    <div className="center">
        <h1>Error 404</h1>
        <h3>Page not Found</h3>
        <p>Our driver can't reach here</p>
        <Button>Go Back</Button>   
    </div>
    </>
    );
}

export default ErrorPage;