
document.addEventListener('DOMContentLoaded', function () {
    const btnUser = document.getElementById('btnUser');
    const cerrarUser = document.getElementById('cerrarUser')

    btnUser.addEventListener('click', function () {
        cerrarUser.classList.toggle('hidden');
    });
})
