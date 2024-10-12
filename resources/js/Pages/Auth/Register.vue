<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    nick_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Registro" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="w-[70%] text-center m-auto">
            <span class="font-robotobold text-base font-bold text-gray-500">
                Regístrate para ver fotos y vídeos y descubrir setups creativos.
            </span>

            <!-- Botón de registro con Pinterest -->
            <div class="flex justify-center items-center my-4">
                <a href="#" class="text-center bg-[#BD081C] hover:bg-red-500 transition ease-in-out duration-150 rounded-md px-4 py-[7px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block align-sub mr-2" viewBox="0 0 448 512">
                        <path fill="#fff" d="M384 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h72.6l-2.2-.8c-5.4-48.1-3.1-57.5 15.7-134.7c3.9-16 8.5-35 13.9-57.9c0 0-7.3-14.8-7.3-36.5c0-70.7 75.5-78 75.5-25c0 13.5-5.4 31.1-11.2 49.8c-3.3 10.6-6.6 21.5-9.1 32c-5.7 24.5 12.3 44.4 36.4 44.4c43.7 0 77.2-46 77.2-112.4c0-58.8-42.3-99.9-102.6-99.9C153 139 112 191.4 112 245.6c0 21.1 8.2 43.7 18.3 56c2 2.4 2.3 4.5 1.7 7c-1.1 4.7-3.1 12.9-4.7 19.2c-1 4-1.8 7.3-2.1 8.6c-1.1 4.5-3.5 5.5-8.2 3.3c-30.6-14.3-49.8-59.1-49.8-95.1C67.2 167.1 123.4 96 229.4 96c85.2 0 151.4 60.7 151.4 141.8c0 84.6-53.3 152.7-127.4 152.7c-24.9 0-48.3-12.9-56.3-28.2c0 0-12.3 46.9-15.3 58.4c-5 19.3-17.6 42.9-27.4 59.3H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64z"/>
                    </svg>
                    <span class="font-robotobold text-sm text-gray-50 font-medium">Iniciar sesión con Pinterest</span>
                </a>
            </div>
        </div>

        <div class="flex justify-center items-center mt-4">
            <hr class=" w-full border border-slate-200 ml-14">
            <span class="mx-4 text-gray-500">o</span>
            <hr class="w-full border border-slate-200 mr-14">
        </div>

        <form @submit.prevent="submit">
            <div class="flex flex-col justify-center items-center">
                <div class="relative mt-4 w-[70%]">
                    <TextInput 
                      id="floating_name"
                      v-model="form.name"
                      type="text"
                      placeholder=" "
                      class="mt-1 block w-full h-[38px] bg-gray-50 text-xs peer px-2 pt-5"
                      required
                      autocomplete="name"
                      :error="form.errors.name"
                    />
                    <label 
                      for="floating_name" 
                      class="absolute text-xs text-gray-500 duration-300 transform -translate-y-2.5 scale-75 top-[0.97rem] left-2 z-10 origin-[0] peer-focus:left-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3"
                    >
                        Nombre
                    </label>
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="relative mt-4 w-[70%]">
                    <TextInput 
                      id="floating_nickName"
                      v-model="form.nick_name"
                      type="text"
                      placeholder=" "
                      class="mt-1 block w-full h-[38px] bg-gray-50 text-xs peer px-2 pt-5"
                      required
                      autocomplete="username"
                      :error="form.errors.nick_name"
                    />
                    <label 
                      for="floating_nickName" 
                      class="absolute text-xs text-gray-500 duration-300 transform -translate-y-2.5 scale-75 top-[0.97rem] left-2 z-10 origin-[0] peer-focus:left-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3"
                    >
                        Nick name
                    </label>
                    <InputError class="mt-2" :message="form.errors.nick_name" />
                </div>
    
                <div class="relative mt-4 w-[70%]">
                    <TextInput
                      id="floating_email"
                      v-model="form.email"
                      type="email"
                      placeholder=" "
                      class="mt-1 block w-full h-[38px] bg-gray-50 text-xs peer px-2 pt-5"
                      required
                      autocomplete="email"
                      :error="form.errors.email"
                    />
                    <label
                      for="floating_email" 
                      class="absolute text-xs text-gray-500 duration-300 transform -translate-y-2.5 scale-75 top-[0.97rem] left-2 z-10 origin-[0] peer-focus:left-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3"
                    >
                        Correo electrónico
                    </label>
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
    
                <div class="relative mt-4 w-[70%]">
                    <TextInput
                        id="floating_password"
                        v-model="form.password"
                        type="password"
                        placeholder=" "
                        class="mt-1 block w-full h-[38px] bg-gray-50 text-xs peer px-2 pt-5"
                        required
                        autocomplete="new-password"
                        :error="form.errors.password"
                    />
                    <label
                      for="floating_password" 
                      class="absolute text-xs text-gray-500 duration-300 transform -translate-y-2.5 scale-75 top-[0.97rem] left-2 z-10 origin-[0] peer-focus:left-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3"
                    >
                        Contraseña
                    </label>
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
    
                <div class="relative mt-4 w-[70%]">
                    <TextInput
                        id="floating_password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        placeholder=" "
                        class="mt-1 block w-full h-[38px] bg-gray-50 text-xs peer px-2 pt-5"
                        required
                        autocomplete="new-password"
                        :error="form.errors.password_confirmation"
                    />
                    <label
                      for="floating_password_confirmation" 
                      class="absolute text-xs text-gray-500 duration-300 transform -translate-y-2.5 scale-75 top-[0.97rem] left-2 z-10 origin-[0] peer-focus:left-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3"
                    >
                        Confirmar Contraseña
                    </label>
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <!-- <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                    <InputLabel for="terms">
                        <div class="flex items-center">
                            <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />
    
                            <div class="ms-2">
                                I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                            </div>
                        </div>
                        <InputError class="mt-2" :message="form.errors.terms" />
                    </InputLabel>
                </div> -->
            </div>

            <!-- Opciones información -->
            <div class="w-[70%] text-center m-auto my-4 text-xs text-gray-600">
                Es posible que los usuarios de nuestro servicio hayan subido tu información de contacto en Instagram. 
                <a href="#" class="text-blue-900 font-medium hover:underline">Más información</a>.
            </div>

            <!-- Opciones legales -->
            <div class="w-[70%] text-center m-auto my-4 text-xs text-gray-600">
                Al registrarte, aceptas nuestras <a href="#" class="text-blue-900 font-medium hover:underline">Condiciones</a>.
                Obtén más información en la <a href="#" class="text-blue-900 font-medium hover:underline">Política de privacidad</a>
                sobre cómo recogemos, usamos y compartimos tus datos, así como sobre el uso que hacemos de las cookies y tecnologías similares en la 
                <a href="#" class="text-blue-900 font-medium hover:underline">Política de cookies</a>.
            </div>

            <div class="flex justify-center items-center mt-4">
                <PrimaryButton class="w-[70%] h-[32px]" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Siguiente
                </PrimaryButton>
            </div>

            <!-- Opciones adicionales -->
            <div class="text-center mt-4 text-xs text-gray-600 px-10">
                También puedes <a href="#" class="text-blue-900 font-medium hover:underline">denunciar el contenido que creas que es ilegal</a> en tu país sin iniciar sesión.
            </div>
        </form>

        <!-- Sección de registro -->
        <template #login>
             <div class="mt-4 py-5 xs:border xs:border-slate-300 overflow-hidden rounded-[1px] text-center">
                 <p class="text-sm text-black font-medium">
                     ¿Tienes una cuenta? 
                     <Link :href="route('login')" class="text-instagram-blue font-bold">Entrar</Link>
                 </p>
             </div>
         </template>
    </AuthenticationCard>
</template>
