<script setup>
    import { Link, router } from '@inertiajs/vue3';
    import { ref, watch } from 'vue';
    import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
    import SearchDropdown from './SearchDropdown.vue';
    import NavLink from '@/Components/NavLink.vue';
    import IconLogo from '../../svg/logo.svg';
    import IconHome from '../../svg/home.svg';
    import IconUser from '../../svg/user.svg';
    import IconSearch from '../../svg/search.svg';
    import IconExit from '../../svg/exit.svg';
    import IconClose from '../../svg/close.svg';
    import DropdownLink from '@/Components/DropdownLink.vue';
    import { FwbAvatar } from 'flowbite-vue';
    import t from '@/Hooks/useTranslation';

    defineProps({
        title: String,
    });

    const search = ref(''); // Almacena la búsqueda
    const users = ref([]); // Almacena los resultados de la búsqueda
    const recentSearches= ref([]);
    const userExists = ref(false);

    const getUserInitials = (name) => {
        return name
            .split(' ')
            .map((n) => n[0])
            .join('')
            .toUpperCase();
        };

    const userSearch = async () => {
        if (search.value.trim() === '') {
            users.value = []; // Vacía los reslutados en caso de búsqueda vacia
            userExists.value = false;
            return;
        }

        const response = await axios.get(`/search/${search.value}`);

        if (response.data.length > 0 && Array.isArray(response.data)) {
            users.value = response.data; // Actualiza los resultados con la respuesta de la API
            userExists.value = true; // Marca que hay resultados

            // Agregar el primer resultado a las búsquedas recientes si no está ya presente
            if (!recentSearches.value.find((u) => u.id === response.data[0].id)) {
                recentSearches.value.unshift(response.data[0]);
            }
        } else {
            users.value = []; // Vacía los resultados si no se encontraron usuarios
            userExists.value = false; // Marca que no hay resultados
        }
    };

    // Cargar búsquedas recientes de localStorage
    const storageRecentSearch = window.localStorage.getItem('recentSearches');

    if (storageRecentSearch) {
        recentSearches.value = JSON.parse(storageRecentSearch);
    }

    // Guardar las búsquedas recientes
    watch(recentSearches, (val) => {
        // Convertir el array a una cadena de texto antes de guardarlo
        window.localStorage.setItem('recentSearches', JSON.stringify(val));
        console.log('Usuarios almacenados:', val);
    });

    const clearInput = () => {
        search.value = ''; // Limpia el valor del input
    };

    const removeUser = (index) => {
        recentSearches.value.splice(index, 1);
        localStorage.setItem('recentSearches', JSON.stringify(recentSearches.value));
    };

    const clearAllUsers = () => {
        recentSearches.value = [];
        localStorage.removeItem('recentSearches');
        users.value = [];
    }

    const resetSearch = () => {
        search.value = '';
    };

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
                    <SearchDropdown @open="resetSearch">
                        <template #trigger>
                            <button type="button" class="flex items-center gap-3 transition ease-in-out duration-150">
                                <IconSearch class="w-6 h-6" />
                                <span class="hidden xl:block">{{ t('Search') }}</span>
                            </button>
                        </template>
                        
                        <template #content>
                            <div class="flex flex-col justify-center px-8">
                                <div class="my-2 pl-6 pt-3 pr-[14px] pb-9">
                                    <span class="hidden xl:block text-2xl font-robotobold">{{ t('Search') }}</span>
                                </div>
                                <div class="flex items-center space-x-1 bg-gray-100 w-full rounded-md px-3 py-1">
                                    <!-- Icono de búsqueda -->
                                    <IconSearch class="w-4 h-4 text-gray-600" />
                                    
                                    <!-- Input de búsqueda -->
                                    <input 
                                        class="border-none bg-transparent w-full focus:ring-0"
                                        type="text"
                                        :placeholder="t('Seeks')"
                                        v-model="search"
                                        @keyup="userSearch"
                                    />

                                    <!-- Botón de clear (X) -->
                                    <button 
                                        v-if="search" 
                                        @click="clearInput"
                                        
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"  viewBox="0 0 512 512">
                                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
                                        </svg>
                                    </button>
                                </div>

                                <!-- Mostrar resultados recientes -->
                                <div 
                                  v-if="!search && recentSearches.length > 0" 
                                  class="flex justify-between items-center mx-6 mt-[6px] mb-2 pt-1"
                                >    
                                    <span class="text-base font-robotobold">{{ t('Recent') }}</span>
                                    <button
                                      @click="clearAllUsers"
                                      class="text-sm font-robotobold text-custom-blue"
                                    >
                                        {{ t('Delete all') }}
                                    </button>
                                </div>

                                <div 
                                  v-if="!search && recentSearches.length > 0" 
                                  class="my-2"
                                >
                                    <ul>
                                        <li
                                            v-for="(user,index) in recentSearches"
                                            :key="index"
                                            :href="`/profile/${user.id}`"
                                            class="flex items-center py-2 px-2 hover:bg-custom-border rounded-sm transition-all"
                                        >
                                            <div class="flex items-center">
                                                <img
                                                    v-if="user.profile_photo_path"
                                                    class="rounded-full w-9 h-9 object-cover border-2 border-gray-700"
                                                    :src="user.profile_photo_path"
                                                    :alt="user.name"
                                                />

                                                <div v-else class="flex items-center justify-center">
                                                    <FwbAvatar
                                                    :initials="getUserInitials(user.name)"
                                                    rounded
                                                />
                                                </div>
                                                <div class="ml-4">
                                                    <span class="block font-bold text-gray-700 text-sm">{{ user.nick_name }}</span>
                                                    <span class="font-light text-gray-400 text-sm">{{ user.name }}</span>
                                                </div>
                                                <!-- Eliminación de usuario -->
                                                <button
                                                  class="flex items-center ml-28"
                                                  @click.prevent="removeUser(index)"
                                                >
                                                    <IconClose class="w-5 h-5 fill-gray-400 hover:fill-red-600" />
                                                </button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Resultados de búsqueda -->
                                 <div 
                                   v-if="search && users.length > 0" 
                                   class="my-2"
                                >
                                    <ul>
                                        <li
                                          v-for="(user, index) in users"
                                          :key="index"
                                          :href="`/profile/${user.id}`"
                                          class="flex items-center py-2 px-2 hover:bg-custom-border rounded-sm transition-all"
                                        >
                                            <img 
                                            v-if="user.profile_photo_path"
                                            class="rounded-full w-9 h-9 object-cover border-2 border-gray-700"
                                            :src="user.profile_photo_path"
                                            :alt="user.name"
                                            />
                                            <div v-else class="flex items-center justify-center">
                                                <FwbAvatar
                                                  :initials="getUserInitials(user.name)"
                                                  rounded
                                                />
                                            </div>
                                            <div class="ml-4">
                                                <span class="block font-bold text-gray-700 text-sm">{{ user.nick_name }}</span>
                                                <span class="font-light text-gray-400 text-sm">{{ user.name }}</span>
                                            </div>
                                        </li>
                                    </ul>
                                 </div>

                                <!-- Sin resultados -->
                                <div v-else-if="search.trim() !== '' && !userExists" class="flex justify-center items-center my-48">
                                    <span class="text-gray-500 text-sm">
                                        {{ t('No results found.') }}
                                    </span>
                                </div>
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