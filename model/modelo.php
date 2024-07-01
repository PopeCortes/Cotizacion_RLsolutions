<?php


class modelo
{
    public static function devuelveUrl($url)
    {
        if ($url == "contenido" || $url == "salir" || $url == "usuarios" || $url == "subCarpetas" || $url == "carpetas") {
            $pagina = "view/module/" . $url . ".php";
        } else if ($url == "okCarpeta1") {
            $pagina = "view/module/carpetas.php";
        } else if ($url == "okSubCarpeta") {
            $pagina = "view/module/subCarpetas.php";
        } else {
            $pagina = "view/inicio.php";
        }
        return $pagina;
    }
}
