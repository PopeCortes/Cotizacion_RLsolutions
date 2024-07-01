<?php

session_start();

class connect
{
    public static function conexion()
    {
        $connect = new PDO("mysql:host=localhost;dbname=cotizacion1.1", "root", "");
        return $connect;
    }
}
