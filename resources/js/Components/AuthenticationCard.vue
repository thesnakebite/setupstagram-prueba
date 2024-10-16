<template>
    <div class="min-h-screen flex justify-center items-center bg-white">
        <div class="flex justify-center w-full md:w-[950px] gap-0 md:gap-5">

            <!-- Imagen portada -->
            <slot name="image" />

            <div class="flex flex-col justify-center w-full xs:w-96 py-[10px]">
                <!-- Formulario Login -->
                <div class="xs:border xs:border-custom-border overflow-hidden rounded-[1px] pb-4">
                    <div class="flex justify-center px-6 pt-12 pb-4">
                        <slot name="logo" />
                    </div>
                    <slot />
                </div>

                <slot name="register" />
                <slot name="login" />
            </div>
        </div>
    </div>
</template>
