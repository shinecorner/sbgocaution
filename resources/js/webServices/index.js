import axios from 'axios';

let webService = axios.create({
    baseURL: process.env.MIX_APP_URL+'/api/auth'
});

export default webService;