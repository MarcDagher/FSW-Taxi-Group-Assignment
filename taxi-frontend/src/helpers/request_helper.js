import axios from "axios";

axios.defaults.baseURL = "http://127.0.0.1:8000/api";

export const request = async ({ route, method = "GET", body }) => {
    try{

      const response = await axios.request({
          url: route,
          method: method,
          data: body,
          headers: {
              "Content-Type": "application/json",
          },
      });
      return response;  
    } catch(e){
      console.log("Error in API Request");
    }
};

export default request;