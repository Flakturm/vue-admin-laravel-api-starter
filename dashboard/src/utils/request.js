import axios from 'axios'
import { MessageBox, Message } from 'element-ui'
import store from '@/store'
import { getToken } from '@/utils/auth'

const DEBUG = process.env.NODE_ENV === 'development'

// create an axios instance
const service = axios.create({
  baseURL: process.env.VUE_APP_BASE_API,
  // withCredentials: true, // send cookies when cross-domain requests
  timeout: 5000 // request timeout
})

// request interceptor
service.interceptors.request.use(
  (config) => {
    // do something before request is sent

    if (store.getters.token) {
      config.headers['authorization'] = 'Bearer ' + getToken()
    }
    return Promise.resolve(config)
  },
  (error) => {
    // do something with request error
    if (DEBUG) {
      console.log(error) // for debug
    }
    return Promise.reject(error)
  }
)

// response interceptor
service.interceptors.response.use(
  /**
   * If you want to get http information such as headers or status
   * Please return  response => response
   */

  (response) => {
    return response.data
  },
  (error) => {
    if (DEBUG) {
      console.log(error.response)
    }

    const res = error.response.data

    if (res.message === 'Unauthenticated.') {
      // Token expired
      MessageBox.confirm('You have been logged out.', {
        confirmButtonText: 'Login',
        closeOnClickModal: false,
        closeOnPressEscape: false,
        showCancelButton: false,
        type: 'warning'
      }).then(() => {
        store.dispatch('user/resetToken').then(() => {
          location.reload()
        })
      })
    }

    Message({
      message: res.message,
      type: 'error',
      duration: 5 * 1000
    })
    return Promise.reject(error)
  }
)

export default service
