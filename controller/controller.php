<?php

require_once "../config/conexion.php";


class controller
{

    public static function consultar_usuario($Nombre)
    {
        $db = new conexion();
        $sql = "SELECT * FROM usuarios WHERE  Nombre = '$Nombre'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $datos = array();
            while ($filas = $result->fetch_assoc()) {
                $datos[] = $filas;
            }

            $response['status'] = 'OK';
            $response['message'] = 'Usuario encontrado';
            $response['datos'] = $datos;
            return $response;
        } else {

            $response['status'] = 'Error';
            $response['message'] = 'Usuario no  Existe';
            return $response;
        }
        $db->close();
    }


    public static function inserta_usuario($Nombre)
    {

        $db = new conexion();
        $sql = "INSERT INTO usuarios (nombre) VALUES ('$Nombre')";
        $db->query($sql);
        if ($db->affected_rows) {
            $response['status'] = 'OK';
            $response['message'] = 'Usuario Guardado!';
            return $response;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'No se puedo registar el usuario';
            return $response;
        }
        $db->close();
    }

    public static function actualiza_usuario($Id, $Nombre_nuevo)
    {
        $db = new conexion();
        $sql = "UPDATE usuarios SET nombre ='$Nombre_nuevo' WHERE Id = '$Id'";

        $db->query($sql);
        if ($db->affected_rows) {

            $response['status'] = 'OK';
            $response['message'] = 'Usuario Actualizado';
            return $response;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Usuario no  Existe';
            return $response;
        }
        $db->close();
    }

    public static function eliminar_usuario($Id)
    {

        $db = new conexion();
        $sql = "DELETE FROM usuarios WHERE Id = '$Id'";

        $db->query($sql);
        if ($db->affected_rows) {
            $response['status'] = 'OK';
            $response['message'] = 'Usuario Eliminado';
            return $response;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Usuario no  Existe';
            return $response;
        }
        $db->close();
    }
}
