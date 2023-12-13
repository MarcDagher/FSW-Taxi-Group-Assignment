import axios from 'axios'

axios.defaults.baseURL = "http//127.0.0.1/api"

export const request = async ({route, method = "GET", body}) =>{
    const response = await axios.request({url: route, method: method, data: body,})
    return response
}