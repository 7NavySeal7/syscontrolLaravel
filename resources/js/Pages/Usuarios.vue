<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-center text-xl text-blacks leading-tight">
                USUARIOS REGISTRADOS
            </h2>
        </template>
                    <!--Formulario registro de nuevo Rol-->
                    <div v-if="window==3">
                        <section class="border-gray-900 max-w-sm mx-auto bg-gray-300 rounded-md shadow-md dark:bg-gray-800 mt-2">
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
                                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-0">
                                    <div>
                                        <label class="text-black dark:text-gray-200" for="name">Nombre</label>
                                        <input v-model="nombreRol" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                </div>
                                <div class="flex justify-end mt-6">
                                    <div>
                                        <button v-if="boton==0" title="Guardar" type="button" @click="registerRol" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Guardar</button>
                                    </div>
                                    <div>
                                        <button v-if="botonReg==1" title="Registrar" type="button" @click="buttonRegRol" class="mr-1 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-gray-400 to-gray-600 transform hover:scale-110">Registrar</button>
                                    </div>
                                    <div>
                                        <button v-if="boton==1" title="Actualizar" type="button" @click="updateRol" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </section>
                        <br>
                        <!--Fin de Formulario de Registro de nuevo Rol-->
                        <!--Tabla Registrio Rol-->
                        <div class="overflow-x-auto">
                            <div class="min-w-screen min-h-screen flex items-start justify-center font-sans overflow-hidden">
                                <div class="w-full lg:w-auto">
                                    <h1 class="uppercase font-semibold text-center text-xl text-blacks leading-tight">Roles Registrados</h1>
                                    <div class="bg-white shadow-md rounded my-6">
                                        <table class="min-w-auto w-auto table-auto">
                                            <thead>
                                                <tr class="bg-blue-100 text-black-600 uppercase text-sm leading-normal">
                                                    <th class="py-3 px-6 text-left">Nombre</th>
                                                    <th class="py-3 px-6 text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-sm font-light">
                                                <tr v-for="(objeto, index) in this.arrayDatosRol" :key="index" class="border-b border-gray-200 hover:bg-gray-100">  
                                                    <td v-text="objeto.name" class="py-3 px-6 text-left whitespace-nowrap">
                                                    </td>
                                                    <td class="py-3 px-6 text-center">
                                                        <div class="flex item-center justify-center">
                                                            <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110" title="Ver">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </div>
                                                            <div @click="updateRegisterRol(objeto)" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Editar">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </div>
                                                            <div @click="destroyRegisterRol2(objeto)" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Eliminar">
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
                        <!--Tabla Registro Rol-->
                    </div>
                    <!--Eliminar registro de Tabla Roles-->
                    <div v-if="botonSupr==3">
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
                                    <button @click="destroyRegisterRol" class="hover:scale-110 flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">SI</button>
                                    <button @click="downRegisterRol" class="hover:scale-110 flex-no-shrink bg-gray-900 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-900 text-white rounded-full">NO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fin de eliminar registro Tabla Roles-->
                    <!--Formulario registro de nuevo Cargo-->
                    <div v-if="window==2">
                        <section class="border-gray-900 max-w-sm mx-auto bg-gray-300 rounded-md shadow-md dark:bg-gray-800 mt-2">
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
                                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-0">
                                    <div>
                                        <label class="text-black dark:text-gray-200" for="name">Nombre</label>
                                        <input v-model="nombreCargo" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    </div>
                                </div>
                                <div class="flex justify-end mt-6">
                                    <div>
                                        <button v-if="boton==0" title="Guardar" type="button" @click="registerCharges" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Guardar</button>
                                    </div>
                                    <div>
                                        <button v-if="botonReg==1" title="Registrar" type="button" @click="buttonRegCharg" class="mr-1 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-gray-400 to-gray-600 transform hover:scale-110">Registrar</button>
                                    </div>
                                    <div>
                                        <button v-if="boton==1" title="Actualizar" type="button" @click="updateCharges" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </section>
                        <br>
                        <!--Fin de Formulario de Registro de nuevo Cargo-->
                        <!--Tabla Registrio Cargo-->
                            <div class="overflow-x-auto">
                                <div class="min-w-screen min-h-screen flex items-start justify-center font-sans overflow-hidden">
                                    <div class="w-full lg:w-auto">
                                        <h1 class="uppercase font-semibold text-center text-xl text-blacks leading-tight">Cargos Registrados</h1>
                                        <div class="bg-white shadow-md rounded my-6">
                                            <table class="min-w-auto w-auto table-auto">
                                                <thead>
                                                    <tr class="bg-blue-100 text-black-600 uppercase text-sm leading-normal">
                                                        <th class="py-3 px-6 text-left">Nombre</th>
                                                        <th class="py-3 px-6 text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-gray-600 text-sm font-light">
                                                    <tr v-for="(objeto, index) in this.arrayDatosCar" :key="index" class="border-b border-gray-200 hover:bg-gray-100">
                                                        
                                                        <td v-text="objeto.name" class="py-3 px-6 text-left whitespace-nowrap">
                                                        </td>

                                                        <td class="py-3 px-6 text-center">
                                                            <div class="flex item-center justify-center">
                                                                <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110" title="Ver">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                    </svg>
                                                                </div>
                                                                <div @click="updateRegisterChar(objeto)" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Editar">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                                </div>
                                                                <div @click="destroyRegisterChar2(objeto)" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Eliminar">
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
                            <!--Tabla Registro Cargo-->
                            <!--Eliminar registro de Tabla Cargo-->
                            <div v-if="botonSupr==2">
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
                                            <button @click="destroyRegisterChar" class="hover:scale-110 flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">SI</button>
                                            <button @click="downDestroyChar" class="hover:scale-110 flex-no-shrink bg-gray-900 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-900 text-white rounded-full">NO</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin de eliminar registro Tabla Cargo-->
                    </div>
                    <!--Formulario de registro Usuario-->
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
                                    <label class="text-black dark:text-gray-200" for="name">Nombre</label>
                                    <input v-model="nombre" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-black dark:text-gray-200" for="surname">Apellido</label>
                                    <input v-model="apellido" id="surname" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-black dark:text-gray-200" for="phone">Telefono</label>
                                    <input v-model="telefono" id="phone" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-black dark:text-gray-200" for="email">Email</label>
                                    <input v-model="email" id="email" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-black dark:text-gray-200" for="rol">Rol</label>
                                    <select v-model="idRol" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        <option v-for="item in arrayDatosRol" :key="item.id" :value="item.id">{{item.name}}</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="text-black dark:text-gray-200" for="charge">Cargo</label>
                                    <select v-model="idCargo" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        <option v-for="item in arrayDatosCar" :key="item.id" :value="item.id">{{item.name}}</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="text-black dark:text-gray-200" for="password">Password</label>
                                    <input v-model="contraseña" id="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>
                            </div>
                            <div v-if="boton==0" class="flex justify-end mt-6">
                                <button title="Guardar" type="button" @click="registerUs" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Guardar</button>
                            </div>
                            <div v-if="boton==1" class="flex justify-end mt-6">
                                <button title="Actualizar" type="button" @click="updateRegisterUs" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Actualizar</button>
                            </div>
                        </form>
                    </section>
                    <!--Fin del Formulario de Usuario-->
                    <!--Tabla Usuarios-->
                    <div v-if="window==0" class="overflow-x-auto">
                        <div class="min-w-screen min-h-screen flex items-start justify-center font-sans overflow-hidden">
                            <div class="w-full lg:w-auto">
                            <!--Boton de Nuevo Registro-->
                            <div class="pt-1.5 inline-block mr-2 mt-2">
                                <button title="Nuevo Usuario" @click="openRegisterUs" type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">
                                    Añadir Usuario
                                </button>
                            </div>
                            <div class="pt-1.5 inline-block mr-2 mt-2">
                                <button title="Nuevo Rol" @click="openRegisterRol" type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-800 to-blue-800 transform hover:scale-110">
                                    Añadir Rol
                                </button>
                            </div>
                            <div class="pt-1.5 inline-block mr-2 mt-2">
                                <button title="Nuevo Cargo" @click="openRegisterCharge" type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-800 to-blue-800 transform hover:scale-110">
                                    Añadir Cargo
                                </button>
                            </div>
                            <!--Fin del Boton-->
                                <div class="bg-white shadow-md rounded my-6">
                                    <table class="min-w-auto w-auto table-auto">
                                        <thead>
                                            <tr class="bg-blue-100 text-black-600 uppercase text-sm leading-normal">
                                                <th class="py-3 px-6 text-left">Nombre</th>
                                                <th class="py-3 px-6 text-left">Apellido</th>
                                                <th class="py-3 px-6 text-center">Telefono</th>
                                                <th class="py-3 px-6 text-center">Email</th>
                                                <th class="py-3 px-6 text-center">Rol</th>
                                                <th class="py-3 px-6 text-center">Cargo</th>
                                                <th class="py-3 px-6 text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">
                                            <tr v-for="(objeto, index) in this.arrayDatosUs" :key="index" class="border-b border-gray-200 hover:bg-gray-100">
                                                
                                                <td v-text="objeto.name" class="py-3 px-6 text-left whitespace-nowrap">
                                                </td>

                                                <td v-text="objeto.surname" class="py-3 px-6 text-left">
                                                </td>

                                                <td v-text="objeto.phone" class="py-3 px-6 text-center">
                                                </td>

                                                <td v-text="objeto.email" class="py-3 px-6 text-center">
                                                </td>

                                                <td class="py-3 px-6 text-center">
                                                    <span value="objeto.idRoles" v-text="objeto.nameRol" class="bg-blue-200 text-purple-600 py-1 px-3 rounded-full text-xs"></span>
                                                </td>

                                                <td class="py-3 px-6 text-center">
                                                    <span value="objeto.idCharges" v-text="objeto.nameCharg" class="bg-blue-200 text-purple-600 py-1 px-3 rounded-full text-xs"></span>
                                                </td>

                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110" title="Ver">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </div>
                                                        <div @click="updateRegisterUs2(objeto)" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Editar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                        <div @click="destroyRegisterUs2(objeto)" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Eliminar">
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
                    <!--Fin de la Tabla Usuarios-->
                    <!--Eliminar registro de Tabla Usuarios-->
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
                                    <button @click="destroyRegisterUs" class="hover:scale-110 flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">SI</button>
                                    <button @click="downRegister" class="hover:scale-110 flex-no-shrink bg-gray-900 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-900 text-white rounded-full">NO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fin de eliminar registro Tabla Usuarios-->
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    //import Usuarios from '@/Jetstream/Usuarios.vue'

    export default defineComponent({
        components: {
            AppLayout,
        },
        props:['usuarios'],
        mounted() {
            this.listarDatosUs();
            this.listarDatosRol();
            this.listarDatosCar();
        },
        data() {
            return {
                window: 0, //1:Tabla 0:Nuevo Usuario 2:Nuevo Cargo 3:Nuevo Rol
                boton: 0, //0:Guardar Registro 1:Actualizar Registro 
                botonSupr:0, //0:Tabla General 1:Eliminar Registro de Usuarios 2:Eliminar Registro Cargos 3:Eliminar Registro de Roles
                botonReg:0,
                titulo: "",
                //Variables Rol
                idRol:"",
                nombreRol:"",
                //Variables Cargo
                idCargo:"",
                nombreCargo:"",
                //Variables de Usuario
                idUser:"",
                nombre:"",
                apellido:"",
                telefono:"",
                email:"",
                idRol:"",
                idCargo:"",
                contraseña:"",
                arrayDatosUs:[],
                arrayDatosRol:[],
                arrayDatosCar:[]
            }
        },
        methods: {
            downRegister(){
                this.window=0, //Deshabilitar ventana de registro.
                this.boton=0,
                this.botonReg=0,
                this.botonSupr=0,
                this.clean();
            },
            listarDatosCar(){
                let me=this;
                var url="/api/charges/index2";
                axios.get(url)
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosCar=respuesta.charg;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            listarDatosRol(){
                let me=this;
                var url="/api/roles/index2";
                axios.get(url)
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosRol=respuesta.rol;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            listarDatosUs(){
                let me=this;
                var url="/api/navegate/index2";
                axios.get(url)
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosUs=respuesta.usuarios;
                })
                .catch(function(error){ 
                    console.log(error);
                })
            },
            clean(){
                //Limpieza Usuarios
                this.nombre="";
                this.apellido="";
                this.telefono="";
                this.email="";
                this.idRol="";
                this.idCargo="";
                this.contraseña="";
                //Limpieza Roles
                this.idRol="",
                this.nombreRol="";
                //Limpieza Cargos
                this.nombreCargo="";
                this.idCargo="";
            },
            openRol(){
                this.window=3, //Habilitar ventana de registro Rol.
                this.titulo="Registro de Rol"
                this.boton=0
            },
            message(titulo,contenido,boton){
                Swal.fire(
                    titulo,
                    contenido,
                    boton
                )
            },
//--------------------------------------------------------------------------------------------------------------------//
//Registrar Roles
            registerRol(){
                let me=this;
                var url="/api/roles/store";
                axios.post(url,{
                    name:this.nombreRol
                })
                .then(function(reponse){
                    me.message('Se registro correctamente','El registro se ha registrado con éxito','success');
                    me.clean();
                    me.listarDatosRol();
                })
                .catch(function(error){
                    console.log(error);
                })
            },

            buttonRegRol(){
                this.boton=0,
                this.botonReg=0,
                this.titulo="Registro de Rol",
                this.clean()
            },

            openRegisterRol(){
                this.window=3, //Habilitar ventana de registro Cargo.
                this.titulo="Registro de Rol",
                this.boton=0
            },
//--------------------------------------------------------------------------------------------------------------------//
//Actualizar Roles
            updateRol(){
                let me=this;
                var url="/api/roles/update";
                axios.put(url,{
                    id:this.idRol, 
                    name:this.nombreRol
                })
                .then(function(reponse){
                    me.message('Se actualizo correctamente','El registro se ha actualizado con éxito','success');
                    me.listarDatosRol();
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            updateRegisterRol(data=[]){
                this.idRol=data['id'];
                this.nombreRol=data['name'];
                this.titulo="Actualizar Registro Rol",
                this.boton=1,
                this.botonReg=1
            },
//--------------------------------------------------------------------------------------------------------------------//
//Eliminar Roles
            destroyRegisterRol(){
                let me=this;
                var url="/api/roles/delete";
                axios.post(url,{
                    id:this.idRol, 
                })
                .then(function(reponse){
                    me.message('Se elimino correctamente','El registro se ha eliminado con éxito','success'); 
                    me.listarDatosRol();
                    me.downRegisterRol();
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            destroyRegisterRol2(data=[]){
                this.idRol=data['id'];
                this.botonSupr=3
            },
            downRegisterRol(){
                this.window=3,
                this.botonSupr=0
            },
//--------------------------------------------------------------------------------------------------------------------//
//Registrar Cargos
            registerCharges(){
                let me=this;
                var url="/api/charges/store";
                axios.post(url,{
                    name:this.nombreCargo
                })
                .then(function(response){
                    me.message('Se registro correctamente','El registro se ha registrado con éxito','success');
                    me.listarDatosCar();
                    me.clean();
                })
                .catch(function(error){
                    console.log(error);
                })
            },

            buttonRegCharg(){
                this.boton=0,
                this.botonReg=0,
                this.titulo="Registro de Cargo",
                this.clean()
            },

            openRegisterCharge(){
                this.window=2, //Habilitar ventana de registro Cargo.
                this.titulo="Registro de Cargo",
                this.boton=0
            },
//--------------------------------------------------------------------------------------------------------------------//
//Actualizar Cargos
            updateCharges(){
                let me=this;
                var url="/api/charges/update";
                axios.put(url,{
                    id:this.idCargo,
                    name:this.nombreCargo
                })
                .then(function(response){
                    me.message('Se actualizo correctamente','El registro se ha actualizado con éxito','success');
                    me.listarDatosCar();
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            updateRegisterChar(data=[]){
                this.idCargo=data['id'];
                this.nombreCargo=data['name'];
                this.titulo="Actualizar Registro Cargo",
                this.boton=1,
                this.botonReg=1
            },
//--------------------------------------------------------------------------------------------------------------------//
//Eliminar Cargos
            destroyRegisterChar(){
                let me=this;
                var url="/api/charges/delete";
                axios.post(url,{
                    id:this.idCargo
                })
                .then(function(reponse){
                    me.message('Se elimino correctamente','El registro se ha eliminado con éxito','success'); 
                    me.listarDatosCar();
                    me.downDestroyChar()
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            destroyRegisterChar2(data=[]){
                this.idCargo=data['id'];
                this.botonSupr=2
            },

            downDestroyChar(){
                this.window=2, 
                this.botonSupr=0, //Deshabilitar ventana de Eliminacion Unidad de Medida.
                this.clean()
            },
//--------------------------------------------------------------------------------------------------------------------//
//Registrar de Usuarios
            registerUs(){
                let me=this;
                var url='/api/navegate/store';
                axios.post(url,{
                    name:this.nombre,
                    surname:this.apellido,
                    phone:this.telefono,
                    email:this.email,
                    id_roles:this.idRol,
                    id_charge:this.idCargo,
                    password:this.contraseña
                })
                .then(function(response){
                    me.message('Se registro correctamente','El registro se ha registrado con éxito','success');
                    me.listarDatosUs();
                    me.clean();
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            
            openRegisterUs(){
                this.window=1,
                this.titulo="Registrar Nuevo Usuario",
                this.boton=0
            },
//--------------------------------------------------------------------------------------------------------------------//
//Actualizar de Usuarios
            updateRegisterUs(){
                let me=this;
                var url="/api/navegate/update";
                axios.put(url,{
                    id:this.idUser,
                    name:this.nombre,
                    surname:this.apellido,
                    phone:this.telefono,
                    email:this.email,
                    id_roles:this.idRol,
                    id_charge:this.idCargo,
                    password:this.contraseña
                })
                .then(function(response){
                    me.message('Se actualizo correctamente','El registro se ha actualizado con éxito','success');
                    me.listarDatosUs();
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            updateRegisterUs2(data=[]){
                this.idUser=data['idNav'];
                this.nombre=data['name'];
                this.apellido=data['surname'];
                this.telefono=data['phone'];
                this.email=data['email'];
                this.idRol=data['idRoles'];
                this.idCargo=data['idCharges'];
                this.contraseña=data['password'];
                this.titulo = "Actualizar Registro Usuario";
                this.boton = 1;
                this.window = 1;
            },
//--------------------------------------------------------------------------------------------------------------------//
//Eliminar Usuarios
            destroyRegisterUs(){
                let me=this;
                var url="/api/navegate/delete";
                axios.post(url,{
                    id:this.idUser
                })
                .then(function(response){
                    me.message('Se elimino correctamente','El registro se ha eliminado con éxito','success');
                    me.listarDatosUs();
                    me.botonSupr=0
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            
            destroyRegisterUs2(data=[]){
                this.idUser=data['idNav'];
                this.botonSupr = 1;
            }
        },
    })
//--------------------------------------------------------------------------------------------------------------------//
</script>

