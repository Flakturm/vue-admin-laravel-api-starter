import request from '@/utils/request'

export function login(data) {
  return request({
    url: '/api/v1/auth/login',
    method: 'post',
    data
  })
}

export function getInfo(token) {
  return request({
    url: '/api/v1/auth/user',
    method: 'get',
    params: { token }
  })
}

export function logout(token) {
  return request({
    url: '/api/v1/auth/logout',
    method: 'get',
    params: { token }
  })
}
