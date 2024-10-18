<script setup>
    import { Head } from '@inertiajs/vue3';
    import MobileBar from '@/Components/MobileBar.vue';
    import Sidebar from '@/Components/Sidebar.vue';
    import BottomNav from '@/Components/BottomNav.vue';

    defineProps({
        title: String,
    });
</script>

<template>
    <Head :title="'Inicio'" />

    <!-- Contenido principal -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside 
          id="default-sidebar" 
          class="hidden md:block fixed h-full w-[72px] xl:w-[244px] 3xl:w-[336px] bg-white border-r border-custom-border" 
          aria-label="Sidebar"
        >
        
            <Sidebar />
        </aside>
        <!-- Main -->
        <div class="flex-1">
            <MobileBar class="md:hidden" />

            <main class="p-6">
                <slot />
            </main>

            <BottomNav class="md:hidden" />
        </div>
    </div>
</template>
