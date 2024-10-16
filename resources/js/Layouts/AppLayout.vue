<script setup>
    import { Head } from '@inertiajs/vue3';
    import SearchMobile from '@/Components/SearchMobile.vue';
    import Sidebar from '@/Components/Sidebar.vue';
    import BottomNav from '@/Components/BottomNav.vue';
</script>

<template>
    <Head :title="'Inicio'" />

    <!-- Contenido principal -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside 
          id="default-sidebar" 
          class="hidden md:block w-[72px] xl:w-[244px] 3xl:w-[336px] bg-white border-r border-custom-border" 
          aria-label="Sidebar"
        >
        
            <Sidebar />
        </aside>
        <!-- Main -->
        <div class="flex-1">
            <SearchMobile class="md:hidden" />

            <main class="p-6">
                <slot />
            </main>

            <BottomNav class="md:hidden" />
        </div>
    </div>
</template>
