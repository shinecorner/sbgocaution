import axios from 'axios';

let webService = axios.create({
    baseURL: 'http://crm.gocaution.local/api/auth'
});

export default webService;