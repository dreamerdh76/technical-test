<script setup>
import TaskItem from './TaskItem.vue'
const props = defineProps({
  tasks: Array,
  emptyText: String,
  done: { type: Boolean, default: false }
})
const emit = defineEmits(['toggle'])
</script>

<template>
  <ul class="list-group shadow-sm">
    <TaskItem
      v-for="t in tasks"
      :key="t.id"
      :task="t"
      :done="done"
      @toggle="id => emit('toggle', id)"
    />
    <li v-if="!tasks.length"
        class="list-group-item text-center text-muted">
      {{ emptyText }}
    </li>
  </ul>
</template>
