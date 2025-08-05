import { ref, onMounted } from 'vue'
import { fetchTasks, createTask, toggleTask } from '@/services/tasks'

export default function useTasks() {
  const tasks   = ref([])
  const loading = ref(false)

  const load = async () => {
    loading.value = true
    tasks.value = (await fetchTasks()).data
    loading.value = false
  }

  const add = async ({ title, keywordIds }) => {
    await createTask({ title, keyword_ids: keywordIds })
    await load()
  }

  const toggle = async id => {
    await toggleTask(id)
    await load()
  }

  onMounted(load)

  return { tasks, loading, add, toggle }
}
