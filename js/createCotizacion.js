document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById('modalCreate');
    const openModalBtn = document.getElementById('openModalCreate');
    const closeModalBtn = document.getElementById('closeModalCreate');
    const addRowButton = document.getElementById('addRowButton');
    const tableBody = document.querySelector('#quoteTable tbody');
    const sendDataButton = document.getElementById('sendDataButton'); // Botón para enviar los datos

    if (openModalBtn) {

        // Obtenemos todos los botones de accion
        const btnAccions = document.querySelectorAll('.btnAccion button');

        // Agregamos un evento de click a cada boton de accion
        btnAccions.forEach(btn => {
            btn.addEventListener('click', function () {
                // Obtenemos el elemento de vista de accion relacionado con el boton de accion
                const viewAccion = this.closest('.btnAccion').nextElementSibling;

                // Verificamos si la vista de accion esta oculta
                if (viewAccion.classList.contains('opacity-0')) {
                    // Si esta oculta, la mostramos
                    viewAccion.classList.remove('opacity-0', 'translate-x-full');
                    viewAccion.classList.add('opacity-100', 'translate-x-0');
                } else {
                    // Si no esta oculta, la ocultamos
                    viewAccion.classList.remove('opacity-100', 'translate-x-0');
                    viewAccion.classList.add('opacity-0', 'translate-x-full');
                }
            });
        });




        const toggleModal = (display) => modal.style.display = display;

        if (openModalBtn) {
            openModalBtn.addEventListener('click', () => toggleModal('flex'));
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', () => toggleModal('none'));
        }

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                toggleModal('none');
            }
        });

        const addRow = () => {
            const rowCount = tableBody.rows.length + 1;
            const newRow = document.createElement('tr');
            newRow.className = 'bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100';

            newRow.innerHTML = `
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${rowCount}</td>
        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            <input class="rounded-md" type="text" placeholder="Descripción">
        </td>
        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            <input class="rounded-md" type="text" placeholder="Precio">
        </td>
        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            <input class="rounded-md" type="text" placeholder="Cantidad">
        </td>
        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            <button class="hover:text-red-500 hover:scale-[1.05] transition duration-300 ease-in-out deleteRow">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    `;

            tableBody.appendChild(newRow);

            newRow.querySelector('.deleteRow').addEventListener('click', function () {
                newRow.remove();
                updateRowNumbers();
            });
        };

        const updateRowNumbers = () => {
            tableBody.querySelectorAll('tr').forEach((row, index) => {
                row.querySelector('td').innerText = index + 1;
            });
        };

        const getDataFromTable = () => {
            const data = [];
            tableBody.querySelectorAll('tr').forEach((row) => {
                const cells = row.querySelectorAll('td');
                const descripcion = cells[1].querySelector('input').value;
                const precio = cells[2].querySelector('input').value;
                const cantidad = cells[3].querySelector('input').value;
                data.push({ descripcion, precio, cantidad });
            });
            return data;
        };

        const sendData = () => {
            const data = getDataFromTable();
            fetch('../../../backend/php/insert/insertCotizacion.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(result => {
                    console.log('Success:', result);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        };

        addRow(); // Añadir una fila automáticamente al cargar la página

        addRowButton.addEventListener('click', addRow);
        sendDataButton.addEventListener('click', sendData);
    }
});
