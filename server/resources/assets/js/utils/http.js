import config from '../config/config'
import axios from 'axios'

const getHeaders = () => {
    // Handle authorization token
    return {
        'Authorization': 'Bearer ' + window.localStorage.getItem('token')
    }
}

export function post(uri, data) {
    return axios.post(endpoint(uri), data, {
        headers: getHeaders()
    })
}

export function put(uri, data) {
    return axios.put(endpoint(uri), data, {
        headers: getHeaders()
    })
}

export function remove(uri, data) {
    return axios.delete(endpoint(uri), {
        data,
        headers: getHeaders()
    })
}

export function get(uri) {
    return axios.get(endpoint(uri), {
        headers: getHeaders()
    })
}

export function endpoint(uri) {
    return config.BASE_URL + '/api/' + uri
}