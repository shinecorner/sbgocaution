import axios from 'axios';

export default
    axios.create({
        baseURL: process.env.MIX_APP_URL        
    });
    if(localStorage.getItem('accessToken')){
        axios.defaults.headers.common['Authorization'] = 'Bearer '+localStorage.getItem('accessToken');
    }
    else{
        delete axios.defaults.headers.common["Authorization"];
    }