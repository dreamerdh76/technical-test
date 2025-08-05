<script setup>
import { ref, computed } from 'vue'
import TaskForm     from '@/components/tasks/TaskForm.vue'
import TaskList     from '@/components/tasks/TaskList.vue'
import TaskSection  from '@/components/tasks/TaskSection.vue'
import useTasks     from '@/composables/useTasks'
import useKeywords  from '@/composables/useKeywords'

const { tasks, add, toggle } = useTasks()
const { keywords }           = useKeywords()

const pending   = computed(() => tasks.value.filter(t => !t.is_done))
const completed = computed(() => tasks.value.filter(t =>  t.is_done))

const showCompleted = ref(false) 

</script>

<template>
  <div class="container py-5" style="max-width:900px">
    <h2 class="mb-4 text-center fw-bold">
      <i class="bi bi-list-check me-2"></i>Tareas del equipo
    </h2>

    <TaskForm :keywordOptions="keywords" @create="add"/>

    <TaskSection
      title="Pendientes"
      icon="bi-hourglass-split"
      color="warning"
      :count="pending.length">
      <TaskList :tasks="pending"
                empty-text="¡Sin tareas pendientes!"
                @toggle="toggle"/>
    </TaskSection>

    <TaskSection v-model:open="showCompleted" 
      title="Completadas"
      icon="bi-check-circle-fill"
      color="success"
      :count="completed.length"
      collapsible>
      <TaskList :tasks="completed"
                :done="true"
                empty-text="Ninguna completada todavía"
                @toggle="toggle"/>
    </TaskSection>
  </div>
</template>
