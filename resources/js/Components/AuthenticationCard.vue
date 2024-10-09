<script setup>
    import { Link } from '@inertiajs/vue3';
    import image from '../../images/login.jpg'

    defineProps({
        image: image,
    })
</script>

<template>
    <div class="min-h-screen flex justify-center items-center bg-white">
        <div class="flex justify-center w-full md:w-[950px] gap-0 md:gap-5">

            <!-- Imagen portada -->
            <div class="hidden tablet:flex w-2/4">
                <img :src="image" alt="">
            </div>

            <div class="flex flex-col justify-center w-full xs:w-96 py-[10px]">
                <!-- Formulario Login -->
                <div class="xs:border xs:border-slate-300 overflow-hidden rounded-[1px] pb-4">
                    <div class="flex justify-center px-6 py-10">
                        <slot name="logo" />
                    </div>
                    <slot />
                </div>

                <slot name="register" />
            </div>
        </div>
    </div>
</template>
