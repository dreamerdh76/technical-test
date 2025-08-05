<script setup>
import { computed } from 'vue'

const props = defineProps({ options: { type: Array, default: () => [] } })
let model = defineModel()

if (!model) {
  model = ref([])                  // no había v-model
} else if (!Array.isArray(model.value)) {
  model.value = []                 // llegó null → lo convertimos a array
}

const selected = computed(() =>
  props.options.filter(o => model.value.includes(o.id)))

const available  = computed(() =>
  props.options.filter(o => !model.value.includes(o.id)))


function toggle(id) {
  const i = model.value.indexOf(id)
  i === -1 ? model.value.push(id) : model.value.splice(i, 1)
}

defineOptions({ inheritAttrs: false })
</script>

<template>
  <!-- chips -->
  <div class="mb-2">
    <span
      v-for="opt in selected"
      :key="opt.id"
      class="badge bg-primary me-1"
      style="cursor:pointer"
      @click="toggle(opt.id)">
      {{ opt.name }} <i class="bi bi-x-circle ms-1" />
    </span>

    <span v-if="!selected.length" class="text-muted">Sin selección</span>
  </div>

  <!-- select -->
  <select class="form-select d-inline-block w-auto form-select-sm" 
   style="min-width:110px"
   multiple size="3">
    <option
      v-for="opt in available"
      :key="opt.id"
      :value="opt.id"
      :selected="Array.isArray(model.value) && model.value.includes(opt.id)"
      @mousedown.prevent="toggle(opt.id)">
      {{ opt.name }}
    </option>
  </select>
</template>
