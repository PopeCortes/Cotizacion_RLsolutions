<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones RLsolutions</title>

    <link rel="shortcut icon" href="img/favicon - logo.png" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">

    <!-- CDN - Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CDN - JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Header -->
    <script src="js/header.js"></script>
</head>

<body class="max-w-[1440px] mx-auto">

    <header class="w-full py-2 border border-b-blue-500/70 flex justify-around  place-items-center">
        <div class="w-[250px]">
            <div class="">
                <img src="img/RLsolutions - web 1.1.png" alt="">
            </div>
        </div>
        <ul class="flex space-x-[1.3rem] place-items-center">
            <li class="relative">
                <a id="btnUser" href="#/User" class=" w-[100px] text-center font-semibold text-[1.1rem] bg-blue-500/90 px-3 py-1 rounded-lg text-white">User</a>
                <ul id="cerrarUser" class="hidden absolute bottom-[-40px] rounded-md bg-blue-500">
                    <li class="w-[150px] px-2 py-1  font-semibold text-white"><a class="hover:text-[#DC2A04]" href="index.php?accion=salir">Cerrar Sesion</a></li>
                </ul>
            </li>

        </ul>
    </header>


    <section>
        <?php




        $salida = new controlador();
        $salida->controladorUrl();
        ?>
    </section>


</body>

</html>