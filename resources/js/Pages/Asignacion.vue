<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="uppercase font-semibold text-center text-black text-xl text-blue-800 leading-tight">
                Asignaciones de Material
            </h2>
        </template>
        <!--Formulario de Usuario-->
        <section v-if="window==0" class="border-gray-900 max-w-4xl mx-auto bg-gray-300 rounded-md shadow-md dark:bg-gray-800 mt-2">
            <div class="pt-1 pr-1 flex justify-end">
                <button title="Cerrar" @click="downRegister" class="hover:scale-110 px-1 place-items-center leading-5 text-white transition-colors duration-200 transform rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                    height="24px" viewBox="0 0 24 24" 
                    width="24px" fill="#000000">
                    <path d="M0 0h24v24H0V0z" fill="none"/>
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
                </button> 
            </div>
            <form class="pl-6 pb-6 pr-6">
                <h1 class="flex justify-start text-xl font-bold text-black uppercase dark:text-white">{{titulo}}</h1>
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    
                    <div>
                        <label class="text-black dark:text-gray-200" for="user">Asignado a:</label>
                        <select v-model="nameUser" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option v-for="item in arrayDatosUser" :key="item.id" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="text-black dark:text-gray-200" for="user">Categoria</label>
                        <select v-model="nameCat" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option v-for="item in arrayDatosCat" :key="item.id" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-black dark:text-gray-200" for="material">Material</label>
                        <select v-model="nameMat" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option v-for="item in arrayDatosMat" :key="item.id" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-black dark:text-gray-200" for="quantity">Cantidad</label>
                        <input v-model="cantidad" id="quantity" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div> 
                </div>
                <div v-if="accion==0" class="flex justify-end mt-6">
                    <button title="Guardar" type="button" @click="save" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Guardar</button>
                </div>
                <div v-else class="flex justify-end mt-6">
                    <button title="Actualizar" type="button" @click="save" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Actualizar</button>
                </div>
            </form>
        </section>
        <!--Fin del Formulario de Usuario-->       
        <!-- Tabla Asignación de Material-->
        <div v-else-if="window==1">
            <div class="overflow-x-auto">
                    <div class="min-w-screen min-h-full flex items-start justify-center font-sans overflow-hidden">
                        <div class="w-full lg:w-auto">
                            <!--Boton de Nuevo Registro-->
                            <div @click="openRegister" class="pt-1.5 inline-block mr-2 mt-2">
                                <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Asignar Material</button>
                            </div>
                            <!--Fin del Boton-->
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-auto w-auto table-auto">
                                    <thead>
                                        <tr class="bg-blue-100 text-black-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-center">Fecha de entrega</th>
                                            <th class="py-3 px-6 text-center">Asignado a</th>
                                            <th class="py-3 px-6 text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        <tr v-for="(objeto, index) in assign" :key="index" class="border-b border-gray-200 hover:bg-gray-100">

                                            <td class="py-3 px-6 text-center" >
                                                <span v-text="objeto.date" class="bg-green-200 text-purple-600 py-1 px-3 rounded-full text-xs"></span>
                                            </td>

                                            <td class="py-3 px-6 text-center" v-text="objeto.nameNav">
                                            </td>

                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110" title="Ver">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </div>
                                                    <div @click="updateRegister" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Editar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </div>
                                                    <div @click="destroy" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Eliminar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <!--Fin de la Tabla Asignación de Material-->
            <!-- Tabla Detalle de Material
                <div class="overflow-x-auto">
                        <div class="min-w-screen min-h-screen flex items-start justify-center font-sans overflow-hidden">
                            <div class="w-full lg:w-auto">
                                <h2 class="uppercase font-semibold text-center text-xl text-blue-800 leading-tight">
                                        Material Asignado
                                </h2>
                                <div class="bg-white shadow-md rounded my-6">
                                    <table class="min-w-auto w-auto table-auto">
                                        <thead>
                                            <tr class="bg-blue-100 text-black-600 uppercase text-sm leading-normal">
                                                <th class="py-3 px-6 text-center">Cantidad</th>
                                                <th class="py-3 px-6 text-center">Categoria</th>
                                                <th class="py-3 px-6 text-center">Material</th>
                                                <th class="py-3 px-6 text-center">Imagen</th>
                                                <th class="py-3 px-6 text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">
                                            <tr v-for="(objeto, index) in detAssign" :key="index" class="border-b border-gray-200 hover:bg-gray-100">

                                                <td class="py-3 px-6 text-center" v-text="objeto.quantity">
                                                </td>

                                                <td class="py-3 px-6 text-center" v-text="objeto.nameCat">
                                                </td>

                                                <td class="py-3 px-6 text-center" v-text="objeto.nameMat">
                                                </td>

                                                <td class="py-3 px-6 text-center" v-text="objeto.picture">
                                                </td>

                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110" title="Ver">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </div>
                                                        <div @click="updateRegister" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Editar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                        <div @click="destroy" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Eliminar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                Fin de Tabla Detalle de Material-->
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    //import Welcome from '@/Jetstream/Welcome.vue'

    export default defineComponent({
        components: {
            AppLayout,
        },
        //props:['assign'],
        mounted(){
            this.listarDatosUser();
            this.listarDatosCat();
            this.listarDatosMat();
        },
        data() {
            return {
                window: 1, //1: Tabla 0: Nuevo Registro
                titulo: "",
                accion: 0,
                nameUser:"",
                nameCateg:"",
                nameMat:"",
                cantidad:"",
                arrayDatosUser:[],
                arrayDatosCat:[],
                arrayDatosMat:[] //0: Guardar Registro 1: Actualizar Registro
            }
        },
        methods: {
            listarDatosMat(){
                let me=this;
                var url="/api/materials/index2";
                axios.get(url)
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosMat=respuesta.material;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            listarDatosCat(){
                let me=this;
                var url="/api/categories/index2";
                axios.get(url)
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosCat=respuesta.categ;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            listarDatosUser(){
                let me=this;
                var url="/api/navegate/index2";
                axios.get(url)
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosUser=respuesta.usuarios;
                })
                .catch(function(error){ 
                    console.log(error);
                })
            },
            openRegister(){
                this.window = 0, //Habilitar ventana de registro.
                this.titulo = "Registrar Nueva Asignación",
                this.accion = 0
            },
            downRegister(){
                this.window = 1, //Deshabilitar ventana de registro.
                this.accion = 0
            },
            updateRegister(){
                this.window = 0,
                this.titulo = "Actualizar Asignación de Material",
                this.accion = 1
            },
            destroy(){
                this.accion = 2
            },
            save(){
                this.window = 1
            }
        },
    })
</script>
