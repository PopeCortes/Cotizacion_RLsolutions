<?php
// session_start();
require_once('connect.php');

class crud
{
    public static function registrar($user, $clave)
    {
        $consulta = connect::conexion()->prepare("INSERT INTO user (nombre, apellido, usuario, password, privilegio, idConfig) 
        VALUES(:user, :clave)");
        $consulta->bindParam(':user', $user);
        $consulta->bindParam(':clave', $clave);

        if ($consulta->execute()) {
            return "Success";
        } else {
            return "Error";
        }
        $consulta->closeCursor();
    }

    public static function ingresarSesion($user, $clave)
    {
        $sesion = connect::conexion()->prepare("SELECT * FROM user WHERE usuario = :user AND password = :clave");
        $sesion->bindParam(':user', $user);
        $sesion->bindParam(':clave', $clave);

        if ($sesion->execute()) {
            $dtsSesion = $sesion->fetch(PDO::FETCH_ASSOC);

            if ($dtsSesion) {
                $_SESSION['nombre'] = $dtsSesion['nombre'];
                $_SESSION['apellido'] = $dtsSesion['apellido'];
                $_SESSION['usuario'] = $dtsSesion['usuario'];
                $_SESSION['privilegio'] = $dtsSesion['privilegio'];

                $mensaje = "Success";
            } else {
                $mensaje = "Error: Usuario o contraseña incorrectos";
            }
        } else {
            $mensaje = "Error en la ejecución de la consulta";
        }

        $sesion->closeCursor();
        return $mensaje;
    }


    public static function insertCarpeta($name)
    {
        $carpeta = connect::conexion()->prepare("INSERT INTO carpeta1 (nombre) VALUES(:name)");
        $carpeta->bindParam(':name', $name);
        if ($carpeta->execute()) {
            $mensaje = "Success";
        } else {
            $mensaje = "Error";
        }
        return $mensaje;
        $carpeta->closeCursor();
    }


    public static function insertSubCarpeta($name, $id)
    {
        $carpeta = connect::conexion()->prepare("INSERT INTO subcarpeta (nombre, idCarpeta) VALUES(:name, :idCarpeta)");
        $carpeta->bindParam(':idCarpeta', $id);
        $carpeta->bindParam(':name', $name);
        if ($carpeta->execute()) {
            $mensaje = "Success";
        } else {
            $mensaje = "Error";
        }
        return $mensaje;
        $carpeta->closeCursor();
    }


    public static function viewCarpeta1()
    {
        $view = connect::conexion()->prepare("SELECT * FROM carpeta1");
        if ($view->execute()) {
            return $view->fetchAll(PDO::FETCH_ASSOC);
            $mensaje = "Success";
        } else {
            $mensaje = "Error";
        }
        return $mensaje;
        $view->closeCursor();
    }

    public static function viewSubCarpetas($id)
    {
        $view = connect::conexion()->prepare("SELECT carpeta1.nombre AS nameCarpeta, carpeta1.id AS idCarpeta, subcarpeta.nombre AS nameSubCarpeta, subcarpeta.id AS idSubcarpeta FROM carpeta1 INNER JOIN subcarpeta ON carpeta1.id = subcarpeta.idCarpeta WHERE subcarpeta.idCarpeta = :id;");
        $view->bindParam(':id', $id);
        $view->execute();
        return $view->fetchAll(PDO::FETCH_ASSOC);
        $view->closeCursor();
    }

    public static function nameSubCarpeta($id)
    {
        $view = connect::conexion()->prepare("SELECT * FROM carpeta1 WHERE id = :id");
        $view->bindParam(':id', $id);
        $view->execute();
        return $view->fetchAll(PDO::FETCH_ASSOC);
        $view->closeCursor();
    }

    public static function nameContenido($id)
    {
        $view = connect::conexion()->prepare("SELECT carpeta1.id AS idCarpeta, subcarpeta.nombre, subcarpeta.id
FROM carpeta1
INNER JOIN subcarpeta
ON carpeta1.id = subcarpeta.idCarpeta WHERE subcarpeta.id = :id");
        $view->bindParam(':id', $id);
        $view->execute();
        return $view->fetchAll(PDO::FETCH_ASSOC);
        $view->closeCursor();
    }

public static function CotizacionModel(){
    
}


}
