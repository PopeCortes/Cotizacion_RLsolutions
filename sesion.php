<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones RLsolutions</title>
    <link rel="shortcut icon" href="img/favicon - logo.png" type="image/x-icon">

    <link rel="stylesheet" href="css/tailwind.css">
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CDN - JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <section>
        <div class="w-full h-[100vh] flex justify-center place-items-center bg-[#fAF2ff]">
            <div class="flex w-[800px] h-[500px] bg-[#F8F9F9] rounded-lg border-[2px] border-[#99BCD6] overflow-hidden ">
                <div class="w-[400px] h-[80%] flex justify-center place-items-center">
                    <img class="object-cover w-[80px]" src="img/logo-rlsolutions.png" alt="">
                    <h1 class="rlsolutions text-[40px] font-bold">RLsolutions</h1>
                </div>
                <div class="w-[400px] py-2 px-1">
                    <div class="flex h-[63%] justify-center place-items-center">
                        <div class="block w-full">
                            <h1 class="uppercase text-center text-[2.3rem] mt-12 font-bold">Inicio de sesion</h1>


                            <span class="text-white bg-red-500 text-[1.3rem] rounded-md text-center my-3 mb-7 block">
                                <?php

                                if (isset($_GET['accion'])) {
                                    if (@$_GET['accion'] == 'error') {
                                        echo "Error en Usuario o Contraseña";
                                    }else{
                                        header("Location: index.php");
                                    }
                                }

                                ?>
                            </span>

                            <form id="loginForm" action="" method="post" autocomplete="off">
                                <div class="space-y-[1.3rem]">
                                    <div class="w-[80%] flex justify-between place-items-center">
                                        <label for="username">Usuario</label>
                                        <input id="username" name="username" class="border border-blue-500 rounded-lg px-1 outline-none shadow-lg focus:shadow-inputText" type="text">
                                    </div>
                                    <div class="w-[80%] flex justify-between place-items-center">
                                        <label for="password">Contraseña</label>
                                        <input id="password" name="password" class="border border-blue-500 rounded-lg px-1 outline-none shadow-lg focus:shadow-inputText" type="password">
                                    </div>
                                    <div class="w-[90%] flex justify-center place-items-center">
                                        <button type="submit" name="iniciarSesion" class="border border-blue-500 rounded-lg px-5 py-1 font-semibold text-blue-700 hover:scale-[1.05] transition-all">Entrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once("controller/controlador.php");
    require_once("model/modelo.php");
    require_once("model/crud.php");
    $registro = new controlador();
    $registro->login();




    ?>

    <script src="js/tailwind.js"></script>
</body>

</html>