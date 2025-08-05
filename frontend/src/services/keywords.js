import api from './api'

// Devuelve todas las keywords
export const fetchKeywords = () => api.get('/keywords')

// Crea una nueva keyword
export const createKeyword = payload => api.post('/keywords', payload)
