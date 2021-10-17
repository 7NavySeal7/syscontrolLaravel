<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-center text-xl text-black leading-tight">
                PRODUCTOS
            </h2>
        </template>
        <!--Formulario registro Nueva Unidad de Peso-->
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
                            <input v-model="nombrePeso" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        </div>
                        <!--<div>
                            <label class="text-black dark:text-gray-200" for="description">Descripción</label>
                            <input v-model="descripPeso" id="description" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        </div>-->
                    </div>
                    <div class="flex justify-end mt-6">
                        <div>
                            <button v-if="boton==0" title="Guardar" type="button" @click="registerWeights" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Guardar</button>
                        </div>
                        <div>
                            <button v-if="botonReg==1" title="Registrar" type="button" @click="buttonRegWeights" class="mr-1 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-gray-400 to-gray-600 transform hover:scale-110">Registrar</button>
                        </div>
                        <div>
                            <button v-if="boton==1" title="Actualizar" type="button" @click="updateWeights" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Actualizar</button>
                        </div>
                    </div>
                </form>
            </section>
            <br>
            <!--Fin de Formulario Nueva Unidad de Peso-->
            <!--Tabla Registrio Unidad de Peso-->
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
                                    <tr v-for="(objeto, index) in this.arrayDatosPesos" :key="index" class="border-b border-gray-200 hover:bg-gray-100">  
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
                                                <div @click="updateWeights2(objeto)" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </div>
                                                <div @click="destroyWeights2(objeto)" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Eliminar">
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
            <!--Tabla Registro Unidad de Peso-->
        </div>
        <!--Eliminar registro de Tabla Unidad de Peso-->
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
                        <button type="button" @click="destroyWeights" class="hover:scale-110 flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">SI</button>
                        <button type="button" @click="downDestroyWeights" class="hover:scale-110 flex-no-shrink bg-gray-900 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-900 text-white rounded-full">NO</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin de eliminar registro Tabla Unidad de Peso-->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->    
        <!--Formulario registro Nueva Unidad de Medida-->
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
                            <input v-model="nombreUnit" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        </div>
                        <!--<div>
                            <label class="text-black dark:text-gray-200" for="description">Descripción</label>
                            <input v-model="descripUnit" id="description" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        </div>-->
                    </div>
                    <div class="flex justify-end mt-6">
                        <div>
                            <button v-if="boton==0" title="Guardar" type="button" @click="registerUnits" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Guardar</button>
                        </div>
                        <div>
                            <button v-if="botonReg==1" title="Registrar" type="button" @click="buttonRegUnit" class="mr-1 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-gray-400 to-gray-600 transform hover:scale-110">Registrar</button>
                        </div>
                        <div>
                            <button v-if="boton==1" title="Actualizar" type="button" @click="updateUnits" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Actualizar</button>
                        </div>
                    </div>
                </form>
            </section>
            <br>
            <!--Fin de Formulario Nueva Unidad de Medida-->
            <!--Tabla Registrio Unidad de Medida-->
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
                                    <tr v-for="(objeto, index) in this.arrayDatosMed" :key="index" class="border-b border-gray-200 hover:bg-gray-100">  
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
                                                <div @click="updateUnits2(objeto)" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </div>
                                                <div @click="destroyUnits2(objeto)" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Eliminar">
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
            <!--Tabla Registro Unidad de Media-->
        </div>
        <!--Eliminar registro de Tabla Unidad de Medida-->
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
                        <button type="button" @click="destroyUnits" class="hover:scale-110 flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">SI</button>
                        <button type="button" @click="downDestroyUnits" class="hover:scale-110 flex-no-shrink bg-gray-900 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-900 text-white rounded-full">NO</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin de eliminar registro Tabla Unidad de Medida-->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--Formulario de Usuario-->
        <section v-if="window==1" class="border-gray-900 max-w-4xl mx-auto bg-gray-300 rounded-md shadow-md dark:bg-gray-800 mt-2">
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
            <h1 class="text-xl font-bold text-black uppercase dark:text-white">{{titulo}}</h1>                      
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                    <div>
                        <label class="text-black dark:text-gray-200" for="material">Material</label>
                        <select v-model="nombreMat" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option v-for="item in arrayDatosMat" :key="item.id" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-black dark:text-gray-200" for="supplier">Proveedor</label>
                        <select v-model="nombreProv" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option v-for="item in arrayDatosProve" :key="item.id" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-black dark:text-gray-200" for="code">Código Externo</label>
                        <input v-model="codigoExt" id="code" type="text" class="uppercase block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div> 

                    <div>
                        <label class="text-black dark:text-gray-200" for="quantity">Cantidad</label>
                        <input v-model="cantidad" id="quantity" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div> 

                    <div>
                        <label class="text-black dark:text-gray-200" for="supplier">Seleccione la unidad de peso</label>
                        <select v-model="nombrePeso" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option v-for="item in arrayDatosPesos" :key="item.id" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-black dark:text-gray-200" for="weight">Peso</label>
                        <input v-model="pesoCant" id="quantity" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div> 

                    <div>
                        <label class="text-black dark:text-gray-200" for="supplier">Seleccione la unidad de medida</label>
                        <select v-model="nombreMed" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option v-for="item in arrayDatosMed" :key="item.id" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-black dark:text-gray-200" for="height">Altura</label>
                        <input v-model="altoMed" id="height" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-black dark:text-gray-200" for="width">Ancho</label>
                        <input v-model="anchoMed" id="width" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-black dark:text-gray-200" for="depth">Profundidad</label>
                        <input v-model="profundidadMed" id="depth" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>
                    
                    <div>
                        <label class="text-black dark:text-gray-200" for="condition">Condición</label>
                        <select v-model="condicion" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option value="1">Nuevo</option>
                            <option value="2">Usado</option>
                        </select>
                    </div>
                    <!--Seleccionar Imagén-->
                    <div>
                        Herramientas:
                        <tbody>
                            <tr>
                            <td>
                                <div>
                                    <button title="Buscar Imagén" type="button" class="mt-2 mr-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M6 7v3H5v10h16V8h-4.05l-1.83-2H9v1H6zm7 2c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5z" opacity=".3"/>
                                        <path d="M21 6h-3.17L16 4H9v2h6.12l1.83 2H21v12H5V10H3v10c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zM8 14c0 2.76 2.24 5 5 5s5-2.24 5-5-2.24-5-5-5-5 2.24-5 5zm5-3c1.65 0 3 1.35 3 3s-1.35 3-3 3-3-1.35-3-3 1.35-3 3-3zM5 9V6h3V4H5V1H3v3H0v2h3v3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <button title="Tomar Fotografia" type="button" class="mt-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <path d="M0 0h24v24H0V0z" fill="none"/>
                                        <path d="M20 6h-4.05l-1.83-2H9.88L8.05 6H4v12h16V6zm-8 11c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z" opacity=".3"/>
                                        <path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2h-3.17L15 2H9L7.17 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM4 6h4.05l1.83-2h4.24l1.83 2H20v12H4V6zm8 1c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    </div>

                </div>

                    <div v-if="boton==0" class="flex justify-end mt-6">
                        <button title="Guardar" type="button" @click="registerProd" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Guardar</button>
                    </div>

                    <div v-if="botonReg==1" class="flex justify-end mt-6">
                        <button title="Registrar" type="button" @click="" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Actualizar</button>
                    </div>

                    <div v-if="boton==1" class="flex justify-end mt-6">
                        <button title="Actualizar" type="button" @click="updateRegisterProd" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Actualizar</button>
                    </div>
            </form>
        </section>
        <!--Fin del Formulario de Usuario-->
        <!-- Tabla Productos-->
                <div v-if="window==0" class="overflow-x-auto">
                        <div class="min-w-screen min-h-screen flex items-start justify-center font-sans overflow-hidden">
                            <div class="w-full lg:w-auto">
                            <!--Boton de Nuevo Registro-->
                            <div @click="openRegisterProd" class="pt-1.5 inline-block mr-2 mt-2">
                                <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-400 to-blue-600 transform hover:scale-110">Añadir Producto</button>
                            </div>
                            <div @click="openRegisterUnits" class="pt-1.5 inline-block mr-2 mt-2">
                                <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-800 to-blue-800 transform hover:scale-110">Añadir Medida</button>
                            </div>
                            <div @click="openRegisterWeights" class="pt-1.5 inline-block mr-2 mt-2">
                                <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-blue-800 to-blue-800 transform hover:scale-110">Añadir Peso</button>
                            </div>
                            <!--Fin del Boton-->
                                <div class="bg-white shadow-md rounded my-6">
                                    <table class="min-w-auto w-auto table-auto">
                                        <thead>
                                            <tr class="bg-blue-100 text-black-600 uppercase text-sm leading-normal">
                                                <th class="py-3 px-6 text-center">Material</th>
                                                <th class="py-3 px-6 text-center">Proveedor</th>
                                                <th class="py-3 px-6 text-center">Código Externo</th>
                                                <th class="py-3 px-6 text-center">Cantidad</th>
                                                <th class="py-3 px-6 text-center">Condición</th>
                                                <th class="py-3 px-6 text-center">Imagén</th>
                                                <th class="py-3 px-6 text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">
                                            <tr v-for="(objeto, index) in arrayDatosProd" :key="index" class="border-b border-gray-200 hover:bg-gray-100">

                                                <td class="py-3 px-6 text-center">
                                                    <span  v-text="objeto.nameMat" class="bg-blue-200 text-purple-600 py-1 px-3 rounded-full text-xs"></span>
                                                </td>

                                                <td class="py-3 px-6 text-center">
                                                    <span  v-text="objeto.nameProv" class="bg-blue-200 text-purple-600 py-1 px-3 rounded-full text-xs"></span>
                                                </td>

                                                <td class="py-3 px-6 text-center" v-text="objeto.external_code">
                                                </td>

                                                <td class="py-3 px-6 text-center" v-text="objeto.quantity">
                                                </td>

                                                <td v-if="objeto.condition==1" class="py-3 px-6 text-center">
                                                    Nuevo
                                                </td>
                                                <td v-else-if="objeto.condition==0" class="py-3 px-6 text-center">
                                                    Usado
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
                                                        <div @click="updateRegisterProd2(objeto)" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" title="Editar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                        <div @click="destroyRegisterProd2(objeto)" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Eliminar">
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
        <!-- Fin de la tabla Productos-->
        <!-- Eliminar Tabla Productos -->
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
                                    <button title="Borrar Registro" type="button" @click="destroyRegisterProd" class="hover:scale-110 flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">SI</button>
                                    <button title="No Borrar Registro" type="button" @click="downRegister" class="hover:scale-110 flex-no-shrink bg-gray-900 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-900 text-white rounded-full">NO</button>
                                </div>
                            </div>
                        </div>
                    </div>
        <!--Fin de Eliminar Tabla Productos-->
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
        //props: ['prod'],
        mounted() {
            this.listarDatosProd();
            this.listarDatosMat();
            this.listarDatosProv();
            this.listarDatosPeso();
            this.listarDatosMed();
        },
        data() {
            return {
                window: 0, //0: Tabla 1:Nuevo Regisrto Prods 2:Nuevo Registro Med 3:Nuevo Registro Peso
                titulo: "",
                boton: 0, //0: Guardar Registro 1: Actualizar Registro
                botonSupr:0,
                botonReg:0,
                //Variables de unidades de peso
                idPeso:"",
                nombrePeso:"",
                descripPeso:"",
                //Variables de Unidades de Medida
                idUnit:"",
                nombreUnit:"",
                descripUnit:"",
                //Variables de Productos
                idProd:"",
                nombreMat:"",
                nombreProv:"",
                codigoExt:"",
                cantidad:"",
                nombrePeso:"",
                pesoCant:"",
                nombreMed:"",
                altoMed:"",
                anchoMed:"",
                profundidadMed:"",
                condicion:"",
                imagen:"",
                arrayDatosProd:[],
                arrayDatosMat:[],
                arrayDatosProve:[],
                arrayDatosPesos:[],
                arrayDatosMed:[]
            }
        },
        methods: {
            downRegister(){
                this.window=0
                this.boton=0,
                this.botonSupr=0,
                this.botonReg=0,
                this.clean();
            },
            listarDatosMed(){
                let me=this;
                var url="/api/measurements/index2";
                axios.get(url)
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosMed=respuesta.unit;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            listarDatosPeso(){
                let me=this;
                var url="/api/weights/index2";
                axios.get(url,{

                })
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosPesos=respuesta.peso;
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
                    me.arrayDatosProve=respuesta.proved;

                })
                .catch(function(error){
                    console.log(error);
                })
            },
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
            listarDatosProd(){
                let me=this;
                var url="/api/products/index2";
                axios.get(url)
                .then(function(response){
                    var respuesta=response.data;
                    me.arrayDatosProd=respuesta.prod;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            clean(){
                //Variables de Unidades de Peso
                this.idPeso="",
                this.nombrePeso="",
                this.descripPeso="",
                //Variables de Unidades de Medida
                this.idUnit="",
                this.nombreUnit="",
                this.descripUnit="",
                //Variables de Productos
                this.idProd="",
                this.nombreMat="",
                this.nombreProv="",
                this.codigoExt="",
                this.cantidad="",
                this.nombrePeso="",
                this.pesoCant="",
                this.nombreMed="",
                this.altoMed="",
                this.anchoMed="",
                this.profundidadMed="",
                this.condicion=""
            },
            message(titulo,contenedor,boton){
                Swal.fire(
                    titulo,
                    contenedor,
                    boton
                )
            },
/*----------------------------------------------------------------------------------------------------------------*/
//Registrar Unidades de Peso
            registerWeights(){
                let me=this;
                var url="/api/weights/store";
                axios.post(url,{
                    name:this.nombrePeso,
                    description:this.descripPeso
                })
                .then(function(response){
                    me.message('Se registro correctamente','El registro se ha registrado con éxito','success'); 
                    me.listarDatosPeso();
                    me.clean();
                })
                .catch(function(error){
                    console.log(error);
                })
            },

            buttonRegWeights(){
                this.boton=0,
                this.botonReg=0,
                this.titulo="Registrar Nuevo Peso",
                this.clean();
            },

            openRegisterWeights(){
                this.window=3,
                this.titulo="Registrar Nuevo Peso",
                this.boton=0
            },
/*----------------------------------------------------------------------------------------------------------------*/
//Actualizar Unidades de Peso
            updateWeights(){
                let me=this;
                var url="/api/weights/update";
                axios.put(url,{
                    id:this.idPeso,
                    name:this.nombrePeso,
                    description:this.descripPeso
                })
                .then(function(response){
                    me.message('Se actualizo correctamente','El registro se ha actualizado con éxito','success');
                    me.listarDatosPeso();
                })
                .catch(function(error){
                    console.log(error);
                })
            },

            updateWeights2(data=[]){
                this.idPeso=data['id'];
                this.nombrePeso=data['name'];
                this.descripPeso=data['description'];
                this.window=3,
                this.titulo="Actualizar Nuevo Peso",
                this.boton=1,
                this.botonReg=1
            },  
/*----------------------------------------------------------------------------------------------------------------*/
//Eliminar Unidades de Peso
            destroyWeights(){
                let me=this;
                var url="/api/weights/delete";
                axios.post(url,{
                    id:this.idPeso,
                })
                .then(function(response){
                    me.message('Se elimino correctamente','El registro se ha eliminado con éxito','success');
                    me.listarDatosPeso();
                    me.downDestroyWeights();
                })
                .catch(function(error){
                    console.log(error);
                })
            },

            destroyWeights2(data=[]){
                this.idPeso=data['id'];
                this.botonSupr=3
            },

            downDestroyWeights(){
                this.window=3,
                this.botonSupr=0,
                this.clean()
            },
/*----------------------------------------------------------------------------------------------------------------*/
//Registrar Unidades de Medida
            registerUnits(){
                let me=this;
                var url="/api/measurements/store";
                axios.post(url,{
                    id:this.idUnit,
                    name:this.nombreUnit,
                    description:this.descripUnit
                })
                .then(function(response){
                    me.message('Se registro correctamente','El registro se ha registrado con éxito','success');
                    me.listarDatosMed();
                    me.clean();
                })
                .catch(function(error){
                    console.log(error);
                })
            },

            buttonRegUnit(){
                this.boton=0,
                this.botonReg=0,
                this.titulo="Registrar Nueva Medida"
                this.clean();
            },

            openRegisterUnits(){
                this.window=2,
                this.titulo="Registrar Nueva Medida",
                this.boton=0
            },

            downRegisterUnits(){
                this.window=2,
                this.boton=0,
                this.clean()
            },
/*----------------------------------------------------------------------------------------------------------------*/
//Actualizar Unidades de Medida
            updateUnits(){
                let me=this;
                var url="/api/measurements/update";
                axios.put(url,{
                    id:this.idUnit,
                    name:this.nombreUnit,
                    description:this.descripUnit
                })
                .then(function(response){
                    me.message('Se actualizo correctamente','El registro se ha actualizado con éxito','success');
                    me.listarDatosMed();
                })
                .catch(function(error){
                    console.log(error);
                })
            },

            updateUnits2(data=[]){
                this.idUnit=data['id'];
                this.nombreUnit=data['name'];
                this.descripUnit=data['description'];
                this.window=2,
                this.titulo="Actualizar Nueva Medida",
                this.boton=1,
                this.botonReg=1
            },
/*----------------------------------------------------------------------------------------------------------------*/
//Eliminar Unidades de Medida
            destroyUnits(){
                let me=this;
                var url="/api/measurements/delete";
                axios.post(url,{
                    id:this.idUnit
                })
                .then(function(response){
                    me.message('Se elimino correctamente','El registro se ha eliminado con éxito','success'); 
                    me.listarDatosMed();
                    me.downDestroyUnits()
                })
                .catch(function(error){
                    console.log(error);
                })
            },

            destroyUnits2(data=[]){
                this.idUnit=data['id'];
                this.botonSupr=2
            },

            downDestroyUnits(){
                this.window=2, 
                this.botonSupr=0, //Deshabilitar ventana de Eliminacion Unidad de Medida.
                this.clean()
            },
/*----------------------------------------------------------------------------------------------------------------*/
//Registrar Productos
            registerProd(){
                let me=this;
                var url="/api/products/store";
                axios.post(url,{
                    id_material:this.nombreMat,
                    id_supplier:this.nombreProv,
                    external_code:this.codigoExt.toUpperCase(),
                    quantity:this.cantidad,
                    id_unit_weight:this.nombrePeso,
                    weight_quantity:this.pesoCant,
                    id_umeasurement:this.nombreMed,
                    height_measurement:this.altoMed,
                    width_measurement:this.anchoMed,
                    depth_measurement:this.profundidadMed,
                    condition:this.condicion,
                    picture:this.imagen
                })
                .then(function(response){
                    me.message('Se registro correctamente','El registro se ha registrado con éxito','success');
                    me.listarDatosProd();
                    me.clean();
                })
                .catch(function(error){
                    console.log(error);
                })
            },

            openRegisterProd(){
                this.window = 1, //Habilitar ventana de registro.
                this.titulo = "Registrar Nuevo Producto",
                this.boton = 0 //Habilitar boton guardar registro.
            },
/*----------------------------------------------------------------------------------------------------------------*/
//Actualizar Productos
            updateRegisterProd(){
                let me=this;
                var url="/api/products/update";
                axios.put(url,{
                    id:this.idProd,
                    id_material:this.nombreMat,
                    id_supplier:this.nombreProv,
                    external_code:this.codigoExt.toUpperCase(),
                    quantity:this.cantidad,
                    id_unit_weight:this.nombrePeso,
                    weight_quantity:this.pesoCant,
                    id_umeasurement:this.nombreMed,
                    height_measurement:this.altoMed,
                    width_measurement:this.anchoMed,
                    depth_measurement:this.profundidadMed,
                    condition:this.condicion,
                    picture:this.imagen
                })
                .then(function(response){
                    me.message('Se actualizo correctamente','El registro se ha actualizado con éxito','success');
                    me.listarDatosProd();
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            updateRegisterProd2(data=[]){
                this.idProd=data['idProd'];
                this.nombreMat=data['id_material'];
                this.nombreProv=data['id_vendors'];
                this.codigoExt=data['external_code'];
                this.cantidad=data['quantity'];
                this.nombrePeso=data['idWeights'];
                this.pesoCant=data['weight_quantity'];
                this.nombreMed=data['idMeasurement'];
                this.altoMed=data['height_measurement'];
                this.anchoMed=data['width_measurement'];
                this.profundidadMed=data['depth_measurement'];
                this.condicion=data['condition'];
                this.imagen=data['picture'];
                this.window=1,
                this.titulo="Actualizar Registro de Producto",
                this.boton=1
            },
/*----------------------------------------------------------------------------------------------------------------*/
//Eliminar Productos
            destroyRegisterProd(){
                let me=this;
                var url="/api/products/delete";
                axios.post(url,{
                    id:this.idProd
                })
                .then(function(response){
                    me.message('Se elimino correctamente','El registro se ha eliminado con éxito','success');
                    me.listarDatosProd();
                    me.botonSupr=0
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            destroyRegisterProd2(data=[]){
                this.idProd=data['idProd'];
                this.botonSupr=1
            },
        },
    })
</script>
