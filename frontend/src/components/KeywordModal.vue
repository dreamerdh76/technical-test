<!-- src/components/KeywordModal.vue -->
<script setup>
import { ref } from 'vue'
import useKeywords from '@/composables/useKeywords'

const show = defineModel('show', { type: Boolean, default: false })
const name   = ref('')
const { add } = useKeywords()

async function save () {
  if (!name.value.trim()) return
  await add(name.value)
  name.value = ''
  show.value = false        // cierra modal
}
</script>

<template>
    <Teleport to="body">
    <!-- diálogo -->
    <div
      class="modal fade"
      :class="{ show }"
      tabindex="-1"
      style="display:block"     
      v-if="show"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="bi bi-tag-fill me-2"></i>Nueva palabra clave</h5>
            <button type="button" class="btn-close" @click="show = false"></button>
          </div>

          <div class="modal-body">
            <input v-model="name" class="form-control" placeholder="Ej. urgente" @keyup.enter="save" />
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" @click="show = false">Cancelar</button>
            <button class="btn btn-primary" :disabled="!name.trim()" @click="save">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Backdrop -->
    <div class="modal-backdrop fade show" v-if="show"></div>
  </Teleport>
</template>
