<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import t from '@/Hooks/useTranslation';
import IconLogo from '../../svg/logo.svg';
import IconHome from '../../svg/home.svg';
import IconUser from '../../svg/user.svg';
import IconExit from '../../svg/exit.svg';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div class="flex flex-col-reverse md:flex-row min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <nav class="w-full md:w-20 xl:w-64 3xl:w-[336px] bg-white border-r border-gray-100 flex flex-row md:flex-col items-center xl:items-start fixed md:relative bottom-0 px-4 md:px-8 py-4 md:py-12">
            <div class="flex items-center h-4 mb-0 md:mb-24 px-3 xl:px-0">
                <Link :href="route('dashboard')">
                    <IconLogo class="block xl:hidden w-7 h-7" />
                    <AuthenticationCardLogo class="hidden xl:block text-3xl h-10 w-auto" />
                </Link>
            </div>

            <!-- Enlaces de navegación -->
            <div class="flex-1 px-3 xl:px-0">
                <div class="flex flex-row md:flex-col gap-11 justify-evenly md:justify-start">
                    <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="flex items-center gap-3">
                        <IconHome class="w-7 h-7" />
                        <span class="hidden xl:block">{{ t('Home') }}</span>
                    </NavLink>
                    
                    <NavLink :href="route('profile.show')" :active="route().current('profile.show')" class="flex items-center gap-3">
                        <IconUser class="w-7 h-7" />
                        <span class="hidden xl:block">{{ t('Profile') }}</span>
                    </NavLink>
                </div>
            </div>

            <!-- Sección de cierre de sesión -->
            <div class="px-3 xl:px-0">
                <form @submit.prevent="logout">
                    <NavLink as="button" class="flex items-center gap-3">
                        <IconExit class="w-7 h-7" />
                        <span class="hidden xl:block">{{ t('Log Out') }}</span> 
                    </NavLink>
                </form>
            </div>
        </nav>

        <!-- Contenido principal -->
        <div class="flex-1">
            <!-- Contenido de la página -->
            <main class="p-6">
                <slot />
            </main>
        </div>
    </div>
</template>
