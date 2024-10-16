<script setup>
    import { Link, router } from '@inertiajs/vue3';
    import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
    import SearchDropdown from './SearchDropdown.vue';
    import NavLink from '@/Components/NavLink.vue';
    import IconLogo from '../../svg/logo.svg';
    import IconHome from '../../svg/home.svg';
    import IconUser from '../../svg/user.svg';
    import IconSearch from '../../svg/search.svg';
    import IconExit from '../../svg/exit.svg';
    import DropdownLink from './DropdownLink.vue';
    import t from '@/Hooks/useTranslation';

    defineProps({
        title: String,
    });

    const logout = () => {
        router.post(route('logout'));
    };
</script>

<template>
    <div class="flex flex-col h-full px-4 xl:px-3 pt-2 pb-5 overflow-y-auto">
        <!-- Logo -->
        <div class="block h-[92px] grow-0">
            <div class="flex justify-center xl:justify-start items-center pt-[25px] pb-4 mb-5 px-3 w-full">
                <Link :href="route('dashboard')">
                    <IconLogo class="block xl:hidden w-6 h-6" />
                    <AuthenticationCardLogo class="hidden xl:block text-3xl h-10 w-auto" />
                </Link>
            </div>
        </div>
        <!-- Navigation -->
        <div class="w-full grow">
            <ul class="flex flex-col">
                <li class="flex justify-center xl:justify-start items-center my-1 p-3 w-full">
                    <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="flex items-center gap-3">
                        <IconHome class="w-6 h-6"/>
                        <span class="hidden xl:block">{{ t('Home') }}</span>
                    </NavLink>
                </li>
                <li class="flex justify-center xl:justify-start items-center my-1 p-3 w-full">
                    <SearchDropdown>
                        <template #trigger>
                            <button type="button" class="flex items-center gap-3 transition ease-in-out duration-150">
                                <IconSearch class="w-6 h-6" />
                                <span class="hidden xl:block">{{ t('Search') }}</span>
                            </button>
                        </template>
                        
                        <template #content>
                            <!-- Account Management -->
                            <div class="flex flex-col justify-center px-8">
                                <span class="hidden xl:block">{{ t('Search') }}</span>
                                <input 
                                    class="border-none bg-gray-100 w-full rounded-md"
                                    type="text"
                                    :placeholder="t('Seeks')"
                                />
                            </div>
                        </template>
                    </SearchDropdown>
                </li>
                <li class="flex justify-center xl:justify-start items-center my-1 p-3 w-full">
                    <NavLink :href="route('profile.show')" :active="route().current('profile.show')" class="flex items-center gap-3">
                        <IconUser class="w-6 h-6"/>
                        <span class="hidden xl:block">{{ t('Profile') }}</span>
                    </NavLink>
                </li>
            </ul>
        </div>
            
        <!-- Sección de cierre de sesión -->
        <div class="flex justify-center xl:justify-start my-4 p-3 w-full grow-0">
            <form @submit.prevent="logout" class="flex">
                <DropdownLink  
                    as="button"
                >
                    <IconExit class="w-6 h-6"/>
                    <span class="hidden xl:block">{{ t('Log Out') }}</span>                       
                </DropdownLink>
            </form>
        </div>
    </div>
</template>