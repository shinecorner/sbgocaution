import axios from 'axios';
import { store } from '../store/store';
import router from '../router'

let webService = axios.create({
    baseURL: process.env.MIX_APP_URL+'/api/auth'
});
webService.interceptors.response.use(function (response) {       
        if (response.data.hasOwnProperty('helpers')) {
            const serverhelpers = response.data.helpers;        
            store.dispatch('setServerHelpers',{serverhelpers});
        }
        return response;
    }, function (error) {
    if (401 === error.response.status) {
        router.push("/session/login");        
        return Promise.reject(error);
    } else {
        return Promise.reject(error);
    }
});
export default webService;