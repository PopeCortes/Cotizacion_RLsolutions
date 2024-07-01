<div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-900 bg-opacity-50" id="modal" style="display: none;">
    <div class="bg-white p-8 rounded-lg relative">
        <div class="text-xl font-bold mb-4">Crear carpeta</div>
        <form action="" id="InsertCartpeta" method="post" autocomplete="off" class="bg-white shadow-md rounded w-[500px] px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="folder_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la Carpeta</label>
                <input id="nameCarpeta" name="nameCarpeta" type="text" placeholder="Nombre de la carpeta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" name="SaveCarp" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
            </div>
        </form>

        <button class="absolute top-[-5px] right-0 mt-4 px-2 py-1 hover:text-red-500 font-bold" id="closeModal">X</button>
    </div>
</div>


<?php

$carpeta = new controlador();
$carpeta->carpeta();

?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById('modal');
        const openModalBtn = document.getElementById('openModal');
        const closeModalBtn = document.getElementById('closeModal');

        if (openModalBtn) {

            openModalBtn.addEventListener('click', function() {
                modal.style.display = 'flex';
            });
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });
        }

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>