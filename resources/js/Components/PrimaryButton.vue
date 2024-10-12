<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" 
            class="font-robotoregular inline-flex justify-center text-center items-center px-4 py-1 bg-instagram-blue border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-[#1877F2] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-0 disabled:opacity-50 transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
