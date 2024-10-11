<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
    error: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="border focus:ring-0 rounded-[1px]"
        :class="{
            'border border-red-500': error,
            'border border-gray-300 focus:border-gray-400': !error
        }"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>
