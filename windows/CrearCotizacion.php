<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-900 bg-opacity-50" id="modalCreate" style="display: none;">
    <div class="bg-white p-8 rounded-lg relative">
        <div class="text-xl font-bold mb-4 text-center">
            <h1>Creación de cotización</h1>
        </div>
        <form action="" id="" method="post" autocomplete="off">
            <div class="">
                <div class="flex justify-around items-center mb-4">
                    <div class="flex space-x-3 items-center">
                        <select class="rounded-md">
                            <option value="MXN">MXN</option>
                            <option value="USD">USD</option>
                        </select>
                        <div class="">
                            <label for="">Validez de entrega</label>
                            <input class="w-[50px] rounded-md text-center" type="text" value="30">
                            <select>
                                <option value="Dias">Días</option>
                                <option value="Semana">Semana</option>
                                <option value="Mes">Mes</option>
                            </select>
                        </div>
                    </div>
                    <div class="font-bold">
                        <h3 class="text-xl text-[#4D8EF7]">Saul Monreal</h3>
                    </div>
                </div>

                <!-- Tabla de cotización -->
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full" id="quoteTable">
                                    <thead class="bg-gray-200 border-b">
                                        <tr>
                                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">#</th>
                                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Descripción</th>
                                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Precio</th>
                                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Cantidad</th>
                                            <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="text-center mt-6 space-x-5">

                                <!-- Agregar Input -->
                                <button type="button" id="addRowButton" class="bg-[#4D8EF7] text-white active:bg-[#4D8EF7] text-xl font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"><i class="fa-solid fa-square-plus"></i></button>

                                <!-- Crear Cotización -->
                                <button type="button" id="sendDataButton" class="bg-[#4D8EF7] text-white active:bg-[#4D8EF7] text-xl font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                    <i class="fa-solid fa-file-export"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <button class="absolute top-[-5px] right-0 mt-4 px-2 py-1 hover:text-red-500 font-bold" id="closeModalCreate">X</button>
    </div>
</div>

<!-- <script src="../../js/createCotizacion.js"></script> -->