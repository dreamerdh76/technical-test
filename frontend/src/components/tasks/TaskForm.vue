<script setup>
import { ref, computed, toRefs } from 'vue'
import KeywordSelect  from '@/components/KeywordSelect.vue'
import KeywordModal   from '@/components/KeywordModal.vue'

const _props = defineProps({
  keywordOptions: { type: Array, default: () => [] }
})
const { keywordOptions } = toRefs(_props)
const emit = defineEmits(['create'])

/* estado */
const title     = ref('')
const kwIds     = ref([])
const showModal = ref(false)

/* validación */
const titleValid = computed(() => title.value.trim().length >= 4)
const canSubmit  = computed(() => titleValid.value)

/* métodos */
function submit () {
  if (!canSubmit.value) return
  emit('create', { title: title.value.trim(), keywordIds: kwIds.value })
  title.value = ''
  kwIds.value = []
}
</script>

<template>
  <div class="card shadow-sm mb-5">
    <div class="card-body">
      <h5 class="card-title mb-4 d-flex align-items-center">
        <i class="bi bi-plus-circle me-2 fs-5"></i>Nueva tarea
      </h5>

      <div class="row g-4 align-items-end">
        <!-- Título -->
        <div class="col-lg-5">
          <label class="form-label fw-semibold" for="task-title">Título</label>
          <input
            id="task-title"
            v-model.trim="title"
            :class="['form-control', title && !titleValid ? 'is-invalid' : '']"
            placeholder="Ej. Preparar informe trimestral" />
          <div v-if="title && !titleValid" class="invalid-feedback">
            Mínimo 4 caracteres.
          </div>
        </div>

        <!-- Palabras clave -->
        <div class="col-lg-5">
          <label class="form-label fw-semibold">
            Palabras clave
            <button
              class="btn btn-link p-0 ms-2"
              style="font-size:1.25rem"
              title="Añadir keyword"
              @click="showModal = true">
              <i class="bi bi-plus-circle"></i>
            </button>
          </label>

          <KeywordSelect
            v-model="kwIds"
            :options="keywordOptions"
            class="form-select d-inline-block w-auto form-select-sm"
          />
        </div>

        <!-- Botón -->
        <div class="col-lg-2 d-grid">
          <button class="btn btn-primary" :disabled="!canSubmit" @click="submit">
            <i class="bi bi-check2-circle me-1"></i>Crear
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <KeywordModal v-model:show="showModal" />
</template>

<style scoped>
.form-select-sm { min-height: 90px; }
</style>
