import Button from "../../components/ui/button";
import Header from "../../components/ui/header";
import "./index.css";

function ErrorPage() {
    const goBack = () => {
        window.history.back();
    }
    return (
        <>
            <Header />
            <div className="center">
                <h1 className="error-title">Error 404</h1>
                <h3 className="error-text">Page not Found</h3>
                <p className="error-desc">Our driver can't reach here</p>
                <div onClick={goBack}>
                    <Button>Go Back</Button>
                </div>
            </div>
        </>
    );
}

export default ErrorPage;
