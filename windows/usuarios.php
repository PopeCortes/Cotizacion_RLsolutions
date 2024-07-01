<div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-900 bg-opacity-50" id="modalUser" style="display: none;">
    <div class="bg-white p-8 rounded-lg relative">
        <div class="text-xl font-bold mb-4">Registrar Usuario</div>
        <form action="" id="" method="post">
            <div class="">

                <div class="flex justify-between w-[300px] p-2">
                    <label class="" for="">Nombre(s)</label>
                    <input name="nombre" id="nombre" class="outline-none px-2 border border-blue-500 rounded-lg shadow-lg focus:shadow-inputText" type="text">
                </div>

                <div class="flex justify-between w-[300px] p-2">
                    <label class="" for="">Apellido</label>
                    <input name="apellido" id="apellido" class="outline-none px-2 border border-blue-500 rounded-lg shadow-lg focus:shadow-inputText" type="text">
                </div>

                <div class="flex justify-between w-[300px] p-2">
                    <label class="" for="">Usuario</label>
                    <input name="usuario" id="usuario" class="outline-none px-2 border border-blue-500 rounded-lg shadow-lg focus:shadow-inputText" type="text">
                </div>

                <div class="flex justify-between w-[300px] p-2">
                    <label class="" for="">contraseña</label>
                    <input name="password" id="password" class="outline-none px-2 border border-blue-500 rounded-lg shadow-lg focus:shadow-inputText" type="text">
                </div>

                <div class="flex justify-end mt-4">
                    <button class="px-2 py-1 border border-blue-500 rounded-lg" type="submit">Registrar</button>

                </div>




            </div>
        </form>
        <button class="absolute top-[-5px] right-0 mt-4 px-2 py-1 hover:text-red-500 font-bold" id="closeModalUser">X</button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById('modalUser');
        const openModalBtn = document.getElementById('openModalUser');
        const closeModalBtn = document.getElementById('closeModalUser');

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