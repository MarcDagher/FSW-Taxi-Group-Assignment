import Header from "../../components/ui/header"
import "./index.css"
import  Chat from "../../components/ui/chat"


const Chatting = () => {
  
  return <>

      <Header />
      <div className="wrapper">
        <Chat />    
        {/* <ChatInput /> */}
        <div className="chat-input">
          <input type="text" name="message" placeholder="Type your message here"/>
          <div className="img-container">
            <img src="public/send_logo.svg" alt="send" />
          </div>
        </div>
      </div>
    </>
}


export default Chatting