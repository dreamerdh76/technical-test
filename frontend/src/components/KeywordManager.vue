<script setup>
import { ref } from 'vue'
import useKeywords from '@/composables/useKeywords'

const newName = ref('')
const { keywords, add } = useKeywords()

async function create () {
  await add(newName.value)  // espera a que el back-end responda
  newName.value = ''
}
</script>

<template>
  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title mb-3">
        <i class="bi bi-tags me-2"></i>Palabras clave
      </h5>

      <!-- Nueva keyword -->
      <div class="input-group mb-3">
        <input
          v-model="newName"
          class="form-control"
          placeholder="Nombre…"
          @keyup.enter="create" />
        <button
          class="btn btn-outline-primary"
          :disabled="!newName.trim()"
          @click="create">
          Agregar
        </button>
      </div>

      <!-- Listado -->
      <span
        v-for="k in keywords"
        :key="k.id"
        class="badge bg-secondary me-1 mb-1">
        {{ k.name }}
      </span>
    </div>
  </div>
</template>
