import axios from 'axios';

let apiObject = axios.create({
        baseURL: process.env.MIX_APP_URL        
    });
    if(localStorage.getItem('accessToken')){
        apiObject.defaults.headers.common['Authorization'] = 'Bearer '+localStorage.getItem('accessToken');
    }
    else{
        delete apiObject.defaults.headers.common["Authorization"];
    }   
    apiObject.defaults.headers.common['X-localization'] = localStorage.getItem('selectedLocale');
    apiObject.interceptors.response.use(function (response) {
        if (response.data.hasOwnProperty('helpers')) {
            const serverhelpers = response.data.helpers;                             
            Vue.prototype.$storeObj.dispatch('setServerHelpers',{serverhelpers});
        }
        return response;
    }, function (error) {
    if (401 === error.response.status) {
        Vue.prototype.$routerObj.push("/session/login");        
        return Promise.reject(error);
    } else {
        return Promise.reject(error);
    }
});


export default apiObject;