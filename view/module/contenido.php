<?php require_once "windows/CrearCotizacion.php";
require_once "windows/contenido.php";
?>

<!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


<section class="py-1 bg-blueGray-50">
    <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700" id="nameCotizacion">
                            <?php 
                            $name = new controlador();
                            $name->nameContenido();
                            ?>
                        </h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full space-x-3 flex-grow flex-1 text-right">
                        <button class=" bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" title="Crear Carpeta" id="openModal"><i class="fa-solid fa-folder-plus text-[1.3rem]"></i></button>
                        <button class=" bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" id="openModalCreate" title="Crear Cotización"><i class="fa-solid fa-money-check text-[1.3rem]"></i></button>
                    </div>
                </div>
            </div>

            <div class="block w-full overflow-x-auto">
                <table class="items-center bg-transparent w-full border-collapse ">
                    <thead>
                        <tr>
                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Nombre
                            </th>
                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Fecha
                            </th>
                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Hora
                            </th>
                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Usuario
                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php for ($i = 0; $i < 10; $i++) { ?>
                            <tr>
                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                    Cotización 0-1
                                </th>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    10/05/24
                                </td>
                                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    3:45
                                </td>
                                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <span class="bg-blue-500 text-white text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        Jeoban
                                    </span>
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap pr-5">
                                    <ul class="relative text-[1rem]">
                                        <li class="text-[1rem] btnAccion">
                                            <button class="focus:outline-none p-[.5rem] px-[.8rem] hover:text-blue-500">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                        </li>
                                        <ul class="viewAccion absolute flex items-center top-[25%] right-0 space-x-4 opacity-0 transition-opacity duration-300 ease-in-out transform translate-x-full">
                                            <li><a href="#"><i class="fa-solid fa-eye"></i></a></li>
                                            <li><a href="#"><i class="fa-solid fa-file-arrow-down"></i></a></li>
                                            <li><a href="#"><i class="fa-solid fa-trash"></i></a></li>
                                        </ul>
                                    </ul>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>




<script src="js/createCotizacion.js"></script>