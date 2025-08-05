<script setup>
const props = defineProps({ task: Object, done: Boolean })
const emit  = defineEmits(['toggle'])
</script>

<template>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div :class="done ? 'text-decoration-line-through' : ''">
      {{ task.title }}
      <small v-if="task.keywords?.length">
        <span v-for="k in task.keywords" :key="k.id"
              class="badge bg-secondary me-1">{{ k.name }}</span>
      </small>
    </div>

    <button
      class="btn btn-sm"
      :class="done ? 'btn-outline-warning' : 'btn-outline-success'"
      @click="emit('toggle', task.id)"
    >
      <i :class="done ? 'bi-arrow-counterclockwise' : 'bi-check-lg'"></i>
    </button>
  </li>
</template>
