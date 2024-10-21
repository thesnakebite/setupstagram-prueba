<script setup>
    import Welcome from '../Pages/Welcome.vue';


    defineProps({
        
    })
</script>

<style scope>
    .contain-custom {
        width: min(470px, 100vw);
    }

    .container-article {
        width: 100%;
        min-width: min(390px, 100%);
        padding-bottom: 16px;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: rgb(219, 219, 219);
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .container-svg {
        align-items: center;
        cursor: pointer;
        display: flex;
        margin: 0px;
        padding: 8px;
        border-style: none;
        border-right-style: none;
        border-bottom-style: none;
        border-left-style: none;
        border-top-width: 0;
        border-right-width: 0;
        border-left-width: 0;
        border-bottom-width: 0;
        list-style: none;
        justify-content: center;
        touch-action: manipulation;
        outline: none;
        text-decoration: none;
        text-align: inherit;
    }

    .container-svg-save {
        align-items: center;
        cursor: pointer;
        display: flex;
        margin: 0px;
        padding-top: 8px;
        padding-right: 0px;
        padding-bottom: 8px;
        padding-left: 0px;
        border-style: none;
        border-right-style: none;
        border-bottom-style: none;
        border-left-style: none;
        border-top-width: 0;
        border-right-width: 0;
        border-left-width: 0;
        border-bottom-width: 0;
        list-style: none;
        justify-content: center;
        touch-action: manipulation;
        outline: none;
        text-decoration: none;
        text-align: inherit;
    }

    textarea {
        appearance: none;
        max-height: 80px;
        height: 18px !important;
        padding: 0px;
        border-top-style: none;
        border-right-style: none;
        border-bottom-style: none;
        border-left-style: none;
        resize: none;
        display: flex;
        flex-grow: 1;
        font-size: 14px;
        outline: none;
        max-width: 100%;
        width: 0;
    }

    textarea:focus {
        border: none;
        border-top-style: none;
        border-right-style: none;
        border-bottom-style: none;
        border-left-style: none;   
    }

</style>


<template>
    <div class="flex flex-col min-h-screen mt-4">
        <div class="grow">
            <div class="flex flex-col items-center mt-4 w-full"> <!-- Aquí pueden ir dos columnas strech -->
                
                <!-- Publicaciones -->
                <div class="bg-transparent overflow-y-visible overflow-x-visible box-border mb-4 static">
                    <div class=" max-w-full contain-custom">
                        <article>
                            <div class="container-article">
                                <header class="flex flex-start">
                                    <div>
                                        <a href="#" class="cursor-pointer m-4 flex items-center text-sm outline-none focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                            <img src="https://images.pexels.com/photos/3460478/pexels-photo-3460478.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="h-9 w-9 rounded-full object-cover"
                                            alt="usuario" />
                                            <div>
                                                <p class="block ml-2 font-bold">Álvaro</p>
                                                <span class="block ml-2 text-xs text-gray-600">5 minutes</span>
                                            </div>
                                        </a>
                                    </div>
                                </header>

                                <div class="border border-gray-300 rounded">
                                    <img 
                                        class="w-full max-w-full min-w-full"
                                        src="https://setupstagram.thesnakebite.es/uploads/4bf8e53f-ac51-4750-9d0d-7a5de15b7552.png"
                                        alt="post"
                                    />
                                </div>

                                <div class="relative block">
                                    <div class="flex flex-col h-full">
                                        <!-- Iconos -->
                                        <section class="grid grid-cols-2 items-center my-1">
                                            <div class="flex ml-[-7px]">
                                                <div class="container-svg">
                                                    <div class="flex flex-col justify-center items-center">
                                                        <span>
                                                            <svg aria-label="Me gusta" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                                <title>Me gusta</title>
                                                                <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="container-svg">
                                                    <div class="flex flex-col justify-center items-center">
                                                        <span>
                                                            <svg aria-label="Comentar" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                                <title>Comentar</title>
                                                                <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="container-svg">
                                                    <div class="flex flex-col justify-center items-center">
                                                        <span>
                                                            <svg aria-label="Compartir" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                                <title>Compartir</title>
                                                                <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"></line><polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="ml-auto mr-0 block">
                                                <div class="container-svg-save">
                                                    <div class="flex flex-col justify-center items-center">
                                                        <svg aria-label="Guardar" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
                                                            <title>Guardar</title>
                                                            <polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </section>
                                        <!-- Numeros de Me gusta -->
                                        <section>
                                            <div class="flex justify-start items-center overflow-y-visible min-w-0 min-h-0 overflow-x-visible">
                                                <span class="text-gray-600 text-sm font-bold">7400 Me gusta</span>
                                            </div>    
                                        </section>
                                    </div>
                                    <!-- Comentarios -->
                                    <div class="max-w-full overflow-y-visible overflow-x-visible content-stretch box-border static inline-block mt-2">
                                        <div class="inline-block text-sm">
                                            <span class="inline">
                                                <div>
                                                    <a 
                                                      href="#" 
                                                      class="inline touch-manipulation box-border text-inherit outline-none cursor-pointer list-none text-sm p-0 m-0">
                                                        <div class="static inline-block content-stretch">
                                                            <div class="flex items-center justify-start relative">
    
                                                                <span class="inline m-0 font-bold text-gray-800 text-sm">victorray</span>
                                                                <div class="overflow-y-visible overflow-x-visible ml-1 content-stretch flex-shrink-0 inline-block self-auto grow-0 ">
                                                                    <svg aria-label="Verificado" fill="rgb(0, 149, 246)" height="12" role="img" viewBox="0 0 40 40" width="12">
                                                                        <title>Verificado</title>
                                                                        <path d="M19.998 3.094 14.638 0l-2.972 5.15H5.432v6.354L0 14.64 3.094 20 0 25.359l5.432 3.137v5.905h5.975L14.638 40l5.36-3.094L25.358 40l3.232-5.6h6.162v-6.01L40 25.359 36.905 20 40 14.641l-5.248-3.03v-6.46h-6.419L25.358 0l-5.36 3.094Zm7.415 11.225 2.254 2.287-11.43 11.5-6.835-6.93 2.244-2.258 4.587 4.581 9.18-9.18Z" fill-rule="evenodd"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>      
                                                        </div>
                                                    </a>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <span class="text-gray-700 inline text-sm font-medium">
                                            <div class="inline">
                                                <span class="inline m-0">
                                                    ¿Listo para recibir una hostia?
                                                </span>
                                            </div>
                                        </span>
                                    </div>
                                </div>

                                <!-- Numero de comentarios -->
                                <div class="mt-1 overflow-x-visible overflow-y-visible flex flex-col static items-stretch">
                                    <div class="box-border flex justify-start grow-0">
                                        <a 
                                          href=""
                                          class=" touch-manipulation cursor-pointer list-none outline-none m-0 p-0"
                                        >
                                            <span class="max-w-full overflow-x-visible overflow-y-visible break-words block relative text-gray-500 text-sm font-normal">
                                                Ver los
                                                    <span class="m-0 p-0 break-words">4500</span>
                                                    comentarios
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <!-- Entrada de comentarios -->
                                <div class="flex flex-col justify-start static items-stretch bg-transparent mt-2 overflow-x-visible overflow-y-visible box-border rounded-t-none rounded-b-none">
                                    <section class="block top-[-2px] flex-shrink-0 p-0 border-style relative w-full border-none border-t">
                                        <div class="flex items-center justify-start flex-wrap border-b p-0 border-none ">
                                            <form class="flex flex-row flex-shrink grow">
                                                <div class="flex flex-row items-center flex-shrink grow align-baseline p-0 mx-0">
                                                    <div class="order-3 p-0 mr-[6px] touch-manipulation box-border cursor-pointer">
                                                        <div class="flex justify-center items-center touch-manipulation bg-transparent box-border outline-none">
                                                            <div class="flex flex-col items-center justify-center cursor-pointer">
                                                                <svg aria-label="Emoticono" fill="currentColor" height="13" role="img" viewBox="0 0 24 24" width="13" class="relative block">
                                                                    <title>Emoticono</title>
                                                                    <path d="M15.83 10.997a1.167 1.167 0 1 0 1.167 1.167 1.167 1.167 0 0 0-1.167-1.167Zm-6.5 1.167a1.167 1.167 0 1 0-1.166 1.167 1.167 1.167 0 0 0 1.166-1.167Zm5.163 3.24a3.406 3.406 0 0 1-4.982.007 1 1 0 1 0-1.557 1.256 5.397 5.397 0 0 0 8.09 0 1 1 0 0 0-1.55-1.263ZM12 .503a11.5 11.5 0 1 0 11.5 11.5A11.513 11.513 0 0 0 12 .503Zm0 21a9.5 9.5 0 1 1 9.5-9.5 9.51 9.51 0 0 1-9.5 9.5Z"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <textarea 
                                                      aria-label="Añade un comentario..." 
                                                      placeholder="Añade un comentario..." 
                                                      autocomplete="off" 
                                                      autocorrect="off"  
                                                      dir="" 
                                                      class=" focus:border-none ring-transparent"
                                                      style="height: 18px !important;">
                                                    </textarea>
                                                    <div class="mx-2 block">
                                                        <div 
                                                          class="m-0 p-0 min-w-0 min-h-0 inline text-center cursor-pointer text-sm text-custom-blue rounded-sm outline-none font-bold"
                                                          role="button"
                                                          tabindex="0"
                                                        >
                                                            Publicar
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>