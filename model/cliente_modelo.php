<?php
// Llamo al archivo de conexión
require_once 'conexion.php';

// Funcion para guardar un cliente
function guardarCliente($datos){
    global $conexion;
    $sql = "INSERT INTO clientes (
    nombres, apellidos, cedula, fecha_nacimiento,
    email, telefono, telefono_alt, estado,
    direccion, ciudad, barrio, codigo_postal, observaciones
    ) VALUES (
    :nombres, :apellidos, :cedula, :fecha_nacimiento,
    :email, :telefono, :telefono_alt, :estado,
    :direccion, :ciudad, :barrio, :codigo_postal, :observaciones
    )";

    $s = $conexion->prepare($sql);
    return $s->execute($datos);
}
?>
