import axios from 'axios';
import { store } from '../store/store';

let apiObject = axios.create({
        baseURL: process.env.MIX_APP_URL        
    });
    if(localStorage.getItem('accessToken')){
        apiObject.defaults.headers.common['Authorization'] = 'Bearer '+localStorage.getItem('accessToken');
    }
    else{
        delete apiObject.defaults.headers.common["Authorization"];
    }    
    apiObject.interceptors.response.use(function (response) {    
    if (response.data.hasOwnProperty('helpers')) {
        const serverhelpers = response.data.helpers;        
        store.dispatch('setServerHelpers',{serverhelpers});
    }    
    return response;
  }, function (error) {
    // Do something with response error
    return Promise.reject(error);
  });

export default apiObject;