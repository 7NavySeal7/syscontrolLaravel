<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-center text-xl text-black leading-tight">
                PROVEEDORES
            </h2>
        </template>
                    <!--Formulario de Proveedores-->
                    <section v-if="window==1" class="border-gray-900 max-w-4xl mx-auto bg-gray-300 rounded-md shadow-md dark:bg-gray-800 mt-2">
                        <div class="pt-1 pr-1 flex justify-end">
                            <button title="Cerrar" @click="downRegister" class="hover:scale-110 px-1 place-items-center leading-5 text-black transition-colors duration-200 transform rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                height="24px" viewBox="0 0 24 24" 
                                width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
                            </button> 
                        </div>
                        <form class="pl-6 pb-6 pr-6">
                        <h1 class="text-xl font-bold text-black uppercase dark:text-white">{{titulo}}</h1>                      
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-black dark:text-gray-200" for="username">Nombre</label>
                                    <input v-model="nombre" id="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>
                                
                                <div>
                                    <label class="text-black dark:text-gray-200" for="username">Nit</label>
                                    <input v-model="nit" id="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-black dark:text-gray-200" for="direction">Dirección</label>
                                    <input v-model="direccion" id="direction" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-black dark:text-gray-200" for="email">Email</label>
                                    <input v-model="email" id="email" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-black dark:text-gray-200" for="contact">Contacto</label>
                                    <input v-model="contacto" id="contact" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-black dark:text-gray-200" for="web">Web</label>
                                    <input v-model="web" id="web" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>
                                <div>
                                    <label class="text-black dark:text-gray-200" for="pais">País</label>
                                    <select v-model="idPais" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        <option v-for="item in arrayDatosPais" :key="item.id" :value="item.id">{{item.name}}</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-black dark:text-gray-200" for="pais">Departamento</label>
                                    <select v-model="idDepart" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        <option v-for="item in arrayDatosDepart" :key="item.id" :value="item.id">{{item.name}}</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-black dark:text-gray-200" for="pais">Ciudad</label>
                                    <select v-model="idCiudad" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        <option v-for="item in arrayDatosCiud" :key="item.id" :value="item.id">{{item.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div v-if="boton==0" class="flex justify-end mt-6">
                                <button type="button" @click="register" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Guardar</button>
                            </div>
                            <div v-if="boton==1" class="flex justify-end mt-6">
                                <button type="button" @click="update" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Actualizar</button>
                            </div>
                        </form>
                    </section>
                    <!--Fin del Formulario de Usuario-->
                <!-- Tabla Proveedor -->
                <div v-else class="overflow-x-auto">
                        <div class="min-w-screen min-h-screen flex items-start justify-center  font-sans overflow-hidden">
                            <div class="w-full lg:w-auto">
                            <!--Boton de Nuevo Registro-->
                            <div @click="openRegister" class="pt-1.5 inline-block mr-2 mt-2">
                                <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Nuevo Registro</button>
                            </div>
                            <!--Fin del Boton-->
                                <div class="bg-white shadow-md rounded my-6">
                                    <table class="min-w-auto w-auto table-auto">
                                        <thead>
                                            <tr class="bg-blue-100 text-black-600 uppercase text-sm leading-normal">
                                                <th class="py-3 px-6 text-left">Nombre</th>
                                                <th class="py-3 px-6 text-left">Nit</th>
                                                <th class="py-3 px-6 text-center">Dirección</th>
                                                <th class="py-3 px-6 text-center">Email</th>
                                                <th class="py-3 px-6 text-center">Contacto</th>
                                                <th class="py-3 px-6 text-center">País</th>
                                                <th class="py-3 px-6 text-center">Web</th>
                                                <th class="py-3 px-6 text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">
                                            <tr v-for="(objeto, index) in arrayDatosProv" :key="index" class="border-b border-gray-200 hover:bg-gray-100">
                                                
                                                <td class="py-3 px-6 text-left whitespace-nowrap" v-text="objeto.name">
                                                </td>

                                                <td class="py-3 px-6 text-left" v-text="objeto.nit" >
                                                </td>

                                                <td class="py-3 px-6 text-center" v-text="objeto.direction">
                                                </td>

                                                <td class="py-3 px-6 text-center" v-text="objeto.email">
                                                </td>

                                                <td class="py-3 px-6 text-center" v-text="objeto.contact">
                                                </td>

                                                <td class="py-3 px-6 text-center" >
                                                    <span value="objeto.idCountry" v-text="objeto.nameCountry" class="bg-blue-200 text-purple-600 py-1 px-3 rounded-full text-xs"></span>
                                                </td>

                                                <td class="py-3 px-6 text-center" v-text="objeto.web">                                     
                                                </td>

                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110" title="Ver">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </div>
                                                        <div @click="updateRegister(objeto)" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Editar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                        <div @click="destroy2(objeto)" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Eliminar">
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
                    <!-- Fin de la Tabla Proveedor-->
                    <!-- Eliminar Proveedor -->
                    <div v-if="botonSupr==1">
                        <div class="bg-opacity-25 flex flex-col space-y-4 min-w-screen h-screen animated fadeIn faster fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-gray-600">
                        <div class="flex flex-col p-8 bg-blue-900 shadow-md hover:shodow-lg rounded-2xl">
                            <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-16 h-16 rounded-2xl p-3 border border-blue-100 text-blue-400 bg-blue-50" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="flex flex-col ml-3">
                                    <div class="text-white font-medium leading-none">
                                        ¿Desea eliminar este registro?
                                    </div>
                                    <p class="text-sm text-white leading-none mt-1">
                                        Este proceso no es reversible ¿Está seguro?
                                    </p>
                                    </div>
                                </div>
                                    <button @click="destroy1" class="hover:scale-110 flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">SI</button>
                                    <button @click="downRegister" class="hover:scale-110 flex-no-shrink bg-gray-900 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-900 text-white rounded-full">NO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fin Eliminar Proveedor-->
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    //import Welcome from '@/Jetstream/Welcome.vue'

    export default defineComponent({
        components: {
            AppLayout
        },
        mounted() {
            this.listarDatosProv();
            this.listarDatosPais();
            this.listarDatosDepart();
            this.listarDatosCiud();
        },
        props:['proved'],
        data() {
            return {
                window:0, //0:Tabla 1:Nuevo Registro
                titulo:"",
                boton:0, //0:Guardar 1:Actualizar
                botonSupr:0,
                idVendors:"", //0:Guardar Registro 1:Actualizar Registro
                nombre:"",
                nit:"",
                direccion:"",
                email:"",
                contacto:"",
                web:"",
                idPais:"",
                idDepart:"",
                idCiudad:"",
                arrayDatosProv:[],
                arrayDatosPais:[],
                arrayDatosDepart:[],
                arrayDatosCiud:[]
            }
        },
        methods: {
            clean(){
                this.nombre="",
                this.nit="",
                this.direccion="",
                this.email="",
                this.contacto="",
                this.web="",
                this.idPais="",
                this.idDepart="",
                this.idCiudad=""
            },
            listarDatosCiud(){
                let me=this;
                var url="/api/cities/index2";
                axios.get(url,{

                })
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosCiud=respuesta.city;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            listarDatosDepart() {
                let me=this;
                var url="/api/departaments/index2";
                axios.get(url,{

                })
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosDepart=respuesta.depart;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            listarDatosPais(){
                let me=this;
                var url="/api/countries/index2";
                axios.get(url,{

                })
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosPais=respuesta.count;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            listarDatosProv(){
                let me=this;
                var url="/api/vendors/index2";
                axios.get(url,{

                })
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosProv=respuesta.proved;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            downRegister(){
                this.window=0, //Deshabilitar ventana de registro.
                this.botonSupr=0,
                this.boton=0,
                this.clean();
            },
            message(titulo,contenedor,boton){
                Swal.fire(
                    titulo,
                    contenedor,
                    boton
                )
            },
/*------------------------------------------------------------------------------------------------------------*/
 //Registrar Proveedor
            openRegister(){
                this.window = 1, //Habilitar ventana de registro.
                this.titulo = "Registrar Proveedor",
                this.boton = 0
            },
            register(){
                let me=this;
                var url="/api/vendors/store";
                axios.post(url,{
                    name:this.nombre,
                    nit:this.nit,
                    direction:this.direccion,
                    email:this.email,
                    contact:this.contacto,
                    web:this.web,
                    id_country:this.idPais
                })
                .then(function(response){
                    me.message('Se registro correctamente','El registro se ha registrado con éxito','success');
                    me.listarDatosProv();
                    me.clean();
                })
                .catch(function(error){
                    console.log(error);
                })
            },
/*------------------------------------------------------------------------------------------------------------*/
//Actualizar Proveedor
            update(){
                let me=this;
                var url="/api/vendors/update";
                axios.put(url,{
                    id:this.idVendors,
                    name:this.nombre,
                    nit:this.nit,
                    direction:this.direccion,
                    email:this.email,
                    contact:this.contacto,
                    web:this.web,
                    id_country:this.idPais

                })
                .then(function(response){
                    me.message('Se actualizo correctamente','El registro se ha actualizado con éxito','success');
                    me.listarDatosProv();
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            updateRegister(data=[]){
                this.idVendors=data['id'];
                this.nombre=data['name'];
                this.nit=data['nit'];
                this.direccion=data['direction'];
                this.email=data['email'];
                this.contacto=data['contact'];
                this.web=data['web'];
                this.idPais=data['idCountry'];
                this.idDepart=data['idDepart'];
                this.idCiudad=data['idCity'];
                this.window = 1,
                this.titulo = "Actualizar Registro de Proveedor",
                this.boton = 1
            },
/*------------------------------------------------------------------------------------------------------------*/
//Eliminar Proveedor
            destroy1(){
                let me=this;
                var url="/api/vendors/delete";
                axios.post(url,{
                    id:this.idVendors,
                })
                .then(function(response){
                    me.downRegister();
                    me.message('Se elimino correctamente','El registro se ha eliminado con éxito','success');
                    me.listarDatosProv();
                })
                .catch(function(error){
                    console.log(error);
                })   
            },
            destroy2(data=[]){
                this.idVendors=data['id'];
                this.botonSupr=1
            }
        },
    })
</script>