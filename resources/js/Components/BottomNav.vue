<script setup>
    import { router } from '@inertiajs/vue3';
    import NavLink from '@/Components/NavLink.vue';
    import DropdownLink from '@/Components/DropdownLink.vue';
    import IconHome from '../../svg/home.svg';
    import IconUser from '../../svg/user.svg';
    import IconExit from '../../svg/exit.svg';

    defineProps({
        title: String,
    });

    const logout = () => {
        router.post(route('logout'));
    };
</script>

<template>
    <nav class="fixed bottom-0 left-0 z-40 w-full h-16 bg-white border-t border-custom-border flex justify-around items-center md:hidden">
        <!-- Enlace Dashboard -->
        <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="flex flex-col items-center gap-1">
            <IconHome class="w-6 h-6"/>
        </NavLink>

        <!-- Enlace perfíl -->
        <NavLink :href="route('profile.show')" :active="route().current('profile.show')" class="flex flex-col items-center gap-1">
            <IconUser class="w-6 h-6"/>
        </NavLink>

        <!-- Cierre de sesión -->
        <form @submit.prevent="logout" class="flex flex-col items-center gap-1">
            <DropdownLink as="button">
                <IconExit class="w-6 h-6"/>                      
            </DropdownLink>
        </form>
    </nav>
</template>