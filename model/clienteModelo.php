<?php
require_once '../php/conexion.php';

function existeCedula($cedula) {
    global $conexion;

    $sql = "SELECT COUNT(*) as total FROM clientes WHERE cedula = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $cedula);
    $stmt->execute();
    $stmt->bind_result($total);
    $stmt->fetch();
    $stmt->close();

    return $total > 0;
}

function guardarCliente($datos) {
    global $conexion;

    $sql = "INSERT INTO clientes (
        nombres, apellidos, cedula, fecha_nacimiento,
        email, telefono, telefono_alt, estado,
        direccion, ciudad, barrio, codigo_postal, observaciones
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $conexion->error);
    }

    $stmt->bind_param(
        "sssssssssssss",
        $datos['nombres'],
        $datos['apellidos'],
        $datos['cedula'],
        $datos['fecha_nacimiento'],
        $datos['email'],
        $datos['telefono'],
        $datos['telefono_alt'],
        $datos['estado'],
        $datos['direccion'],
        $datos['ciudad'],
        $datos['barrio'],
        $datos['codigo_postal'],
        $datos['observaciones']
    );

    $resultado = $stmt->execute();

    $stmt->close();
    return $resultado;
}
?>