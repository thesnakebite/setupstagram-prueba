<script setup>
    import { ref, watch } from 'vue';

    import SearchMobileDropdown from './SearchMobileDropdown.vue';
    import TextInput from './TextInput.vue';
    import IconSearch from '../../svg/search.svg'
    import IconClose from '../../svg/close.svg';
    import { FwbAvatar } from 'flowbite-vue';
    import t from '@/Hooks/useTranslation';

    const search = ref(''); // Almacena la búsqueda
    const users = ref([]); // Almacena los resultados de la búsqueda
    const recentSearches= ref([]);
    const userExists = ref(false);

    // Cargar búsquedas recientes de localStorage
    const storageRecentSearch = window.localStorage.getItem('recentSearches');

    if (storageRecentSearch) {
        recentSearches.value = JSON.parse(storageRecentSearch);
    }

    // Guardar las búsquedas recientes
    watch(recentSearches, async (newVal) => {

        // Convertir el array a una cadena de texto antes de guardarlo
        window.localStorage.setItem('recentSearches', JSON.stringify(newVal));
        console.log('Usuarios almacenados: ', newVal);
    });

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

    const clearInput = () => {
        search.value = '';
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
</script>

<template>
    <nav class="fixed top-0 left-0 w-full h-16 bg-white border-b border-custom-border flex justify-between items-center px-4 z-40">
        <div class="flex items-baseline">
            <span class="text-base xs:text-2xl font-robotobold">Para ti</span>
            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </div>

        <SearchMobileDropdown @open="resetSearch">
            <template #trigger>
                <button 
                  type="button" 
                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                  
                    <div class="flex items-center space-x-1 bg-gray-100 w-full rounded-md px-3 py-1">
                        <!-- Icono de búsqueda -->
                        <IconSearch class="w-4 h-4 text-gray-600" />
                                    
                        <!-- Input de búsqueda -->
                        <TextInput 
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"  viewBox="0 0 512 512">
                                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
                            </svg>
                        </button>
                    </div>
                </button>
            </template>

            <template #content>
                <div class="flex flex-col w-full h-full overflow-y-auto relative grow">
                    <div v-if="search && recentSearches.length > 0" class="pt-1 px-4">
                        <span class="text-base font-robotobold">{{ t('Recent') }}</span>
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

                    <!-- Historial de búsqueda -->
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
                                        class="flex items-center ml-40"
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

                    <div v-else-if="search.trim() !== '' && !userExists"  class="flex justify-center py-6">
                        <span class="text-gray-500 text-sm">
                            {{ t('No results found.') }}
                        </span>
                    </div>
                </div>
            </template>
        </SearchMobileDropdown>

    </nav>
</template>