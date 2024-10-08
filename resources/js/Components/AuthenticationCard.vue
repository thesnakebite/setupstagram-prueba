<script setup>
    import { Link } from '@inertiajs/vue3';
    
</script>

<template>
    <div class="min-h-screen flex justify-center items-center bg-white">
        <div class="flex justify-center w-full md:w-[950px] gap-0 md:gap-5">

            <!-- Imagen portada -->
            <div class="hidden tablet:flex w-2/4">
                <img src="../../../public/img/login.jpg" alt="">
            </div>

            <div class="flex flex-col justify-center w-full xs:w-96 py-[10px]">
                <!-- Formulario Login -->
                <div class="xs:border xs:border-slate-300 overflow-hidden rounded-[1px]">
                    <div class="flex justify-center px-6 py-10">
                        <slot name="logo" />
                    </div>
                    <slot />
                </div>

                <!-- Sección de registro -->
                <div class="mt-4 py-5 xs:border xs:border-slate-300 overflow-hidden rounded-[1px] text-center">
                    <p class="text-sm text-black font-medium">
                        ¿No tienes una cuenta? 
                        <Link :href="route('register')" class="text-instagram-blue font-bold">Regístrate</Link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
