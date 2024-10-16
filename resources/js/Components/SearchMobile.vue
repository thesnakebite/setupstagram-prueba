<script setup>
    import Dropdown from '@/Components/SearchDropdown.vue';
    import TextInput from './TextInput.vue';
    import t from '@/Hooks/useTranslation';
</script>

<template>
    <nav class="fixed top-0 left-0 w-full h-16 bg-white border-b border-custom-border flex justify-between items-center px-4 z-40">
        <Dropdown align="right" width="32">
            <template #trigger>
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                    <span class="text-base xs:text-2xl font-robotobold">Para ti</span>

                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
            </template>

            <template #content>
                <div class="py-2 px-4">
                        <p>Usuarios que sigues</p>
                        <!-- Agregar aquí la lista de usuarios seguidos -->
                    </div>
            </template>
        </Dropdown>

        <TextInput
            class="border-none bg-gray-100 w-56 rounded-md px-3 py-1 text-black"
            type="text"
            :placeholder="t('Seeks')"
        />
    </nav>
</template>