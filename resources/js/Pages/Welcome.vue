<script setup>
    import { Head } from '@inertiajs/vue3';
    import PostComponent from '@/Components/PostComponent.vue';

</script>

<template>
    <Head title="Welcome" />

    <div class="grow">
        <div class="flex flex-col items-center justify-center mt-4 w-full pt-[22px]"> <!-- Aquí pueden ir dos columnas strech -->
            <div class="max-w-[630px] w-full">
                <!-- Aquí van las publicaciones -->
                <PostComponent/>
            </div>
        </div>
    </div>
</template>
