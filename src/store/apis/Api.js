// import axios from "axios";

// const Api = axios.create({
//     // baseURL: 'localhost/git/ocs/api'
//     baseURL:''
// });

const Api = (path, data={}) => {

    const BASE_URL = 'http://localhost/vue/dummy_apis/';
    var request_data = {'token': 'N2pPa0Q1RERQS2x', 'data': data };

    return new Promise((resolve, reject) => {
        fetch(BASE_URL + path, {
            // method: 'GET',
            method: 'POST',
            body: JSON.stringify(request_data)
        })
        .then((response) => response.json())
        .then((responseJson) => {
            resolve(responseJson);
        })
        .catch((error) => {
            reject(error);
            alert(error);
        });
    })
}

export default Api;