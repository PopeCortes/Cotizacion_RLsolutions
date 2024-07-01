<?php
// session_start();
require_once("controller/controlador.php");
require_once("model/modelo.php");
require_once("model/crud.php");

// echo $_SESSION['nombre'];

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['nombre'])) {
    // Si el usuario ha iniciado sesión, crear el objeto del controlador y llamar al método inicio
    $inicio = new Controlador();
    $inicio->inicio();
} else {
    // Si el usuario no ha iniciado sesión, redirigir a la página de inicio
    header("Location: sesion.php");
    exit(); // Asegurarse de que el script se detiene después de la redirección
}
