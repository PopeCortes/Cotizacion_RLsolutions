<?php
require_once 'model/crud.php';

class controlador
{
    private $key = 'RLsolutions'; // Debe ser una clave segura y secreta

    public function inicio()
    {
        include("view/inicio.php");
    }

    public function controladorUrl()
    {
        if (isset($_GET['accion'])) {
            $url = $_GET['accion'];
        } else {
            $url = "carpetas";
        }

        if (isset($_GET['item'])) {
            $encryptedId = $_GET['item'];
            $id = $this->decryptId($encryptedId, $this->key);
        }

        $pagina = modelo::devuelveUrl($url);
        include_once($pagina);
    }

    public function login()
    {
        if (isset($_POST['username'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $respuesta = crud::ingresarSesion($username, $password);
            if ($respuesta == "Success") {
                header("Location: sesion.php?accion=ok");
            } else {
                header("Location: sesion.php?accion=error");
            }
        }
    }

    //! ×××××××××××××× Encriptar y desencriptar ID ××××××××××××××××
    public function encryptId($id, $key)
    {
        $cipher = "AES-128-CBC";
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($id, $cipher, $key, $options = 0, $iv);
        $ciphertext = base64_encode($iv . $ciphertext_raw);
        return $ciphertext;
    }

    public function decryptId($encryptedId, $key)
    {
        $cipher = "AES-128-CBC";
        $c = base64_decode($encryptedId);
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = substr($c, 0, $ivlen);
        $ciphertext_raw = substr($c, $ivlen);
        $original_id = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = 0, $iv);
        return $original_id;
    }

    //! ×××××××××××××××××××××× INSERCION DE DATOS A LA BASE DE DATOS ×××××××××××××××××××××××××
    public function carpeta()
    {
        if (isset($_POST['nameCarpeta'])) {
            $nameCarpeta = htmlspecialchars($_POST['nameCarpeta']);
            $respuesta = crud::insertCarpeta($nameCarpeta);
            if ($respuesta == "Success") {
                header("Location: index.php?accion=okCarpeta1");
            } else {
                header("Location: index.php?accion=error");
            }
        }
    }

    public function insertSubCarpetas()
    {
        if (isset($_POST['nameCarpeta']) && isset($_GET['item'])) {
            $nameCarpeta = htmlspecialchars($_POST['nameCarpeta']);
            $encryptedId = $_GET['item'];
            $id = $this->decryptId($encryptedId, $this->key);

            $respuesta = crud::insertSubCarpeta($nameCarpeta, $id);
            if ($respuesta == "Success") {
                header("Location: index.php?accion=okSubCarpeta&item=" . $encryptedId);
            } else {
                header("Location: index.php?accion=error");
            }
        }
    }

    //! ××××××××××××××××××××××××××××××××××× MOSTRAR DATOS ××××××××××××××××××××××××××××××××××××××××××=
    public function viewCarpeta()
    {
        $view = crud::viewCarpeta1();

        foreach ($view as $item) {
            $encryptedId = $this->encryptId($item['id'], $this->key);
            echo '
                <tr>
                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                        <a class="text-[1rem] hover:text-blue-500 transition-all" href="index.php?accion=subCarpetas&item=' . urlencode($encryptedId) . '">' . $item['nombre'] . '</a>
                    </th>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                        <form action="" method="post">
                            <input type="hidden" hidden name="id" value="' . urlencode($encryptedId) . '">
                            <button type="submit" name="deleteCarpeta">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            ';
        }
    }

    public function subCarpetas()
    {
        if (isset($_GET['item'])) {
            $encryptedId = $_GET['item'];
            $id = $this->decryptId($encryptedId, $this->key);
            $view = crud::viewSubCarpetas($id);

            foreach ($view as $item) {
                $encryptedId = $this->encryptId($item['idSubcarpeta'], $this->key);
                echo '
                <tr>
                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                        <a class="text-[1rem] hover:text-blue-500 transition-all" href="index.php?accion=contenido&item=' . urlencode($encryptedId) . '">' . htmlspecialchars($item['nameSubCarpeta']) . '</a>
                    </th>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                        <i class="fa-solid fa-trash"></i>
                    </td>
                </tr>';
            }
        }
    }

    //! ××××××××××××××××××××××××××× NOMBRE DE LAS CARPETAS ×××××××××××××××××××××××××××
    public function nameSubC()
    {
        if (isset($_GET['item'])) {
            $encryptedId = $_GET['item'];
            $id = $this->decryptId($encryptedId, $this->key);
            $view = crud::nameSubCarpeta($id);
            foreach ($view as $item2) {
                echo htmlspecialchars($item2['nombre']);
            }
        }
    }

    public function nameContenido()
    {
        if (isset($_GET['item'])) {
            $encryptedId = $_GET['item'];
            $id = $this->decryptId($encryptedId, $this->key);
            $view = crud::nameContenido($id);
            foreach ($view as $item2) {
                echo '<a href="index.php?accion=subCarpetas&item=' . urlencode($id) . '">' . htmlspecialchars($item2['nombre']) . '</a>';
            }
        }
    }
}

