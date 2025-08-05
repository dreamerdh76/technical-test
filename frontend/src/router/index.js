// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router'
import TasksPage from '@/components/pages/TaskList.vue'

const routes = [
  { path: '/',          redirect: '/tareas' },
  { path: '/tareas',    component: TasksPage,   name: 'tasks' },
]

export default createRouter({
  history: createWebHistory(),
  routes
})
