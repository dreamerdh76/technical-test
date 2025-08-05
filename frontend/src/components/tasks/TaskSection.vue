<script setup>
const props = defineProps({
  title: String,
  icon : String,
  color: String,
  count: Number,
  collapsible: Boolean
})
const open = defineModel('open', { type: Boolean, default: true })
</script>

<template>
  <section class="mb-4">
    <button v-if="collapsible"
            class="btn btn-link d-flex align-items-center mb-2"
            @click="open = !open">
      <h4 class="mb-0">
        <i :class="`bi ${icon} text-${color} me-1`"></i>{{ title }}
        <span class="badge" :class="`bg-${color}`">{{ count }}</span>
      </h4>
      <i class="bi ms-2"
         :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
    </button>

    <div v-show="open">
      <slot/>
    </div>
  </section>
</template>
