// ✅  keywordStore fuera para que sea singleton
import { ref, onMounted } from 'vue'
import { fetchKeywords, createKeyword } from '@/services/keywords'

const keywords = ref([])

async function load () {
  const { data } = await fetchKeywords()   
  keywords.value = data    
}
async function add(name) {
  if (!name.trim()) return

  const { data } = await createKeyword({ name }) 
  keywords.value.push(data)                      

  return data
}

export default function useKeywords () {
  onMounted(() => { if (!keywords.value.length) load() })
  return { keywords, add }
}
