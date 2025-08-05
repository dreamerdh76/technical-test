
import api from './api'             

export const fetchTasks = ()      => api.get('/tasks')
export const createTask = payload => api.post('/tasks', payload)
export const toggleTask = id      => api.patch(`/tasks/${id}/toggle`)
