<?php
require_once '../php/conexion.php';

// Función para guardar un nuevo cliente
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

// Función para verificar si la cédula ya existe
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

// Función para obtener el total de clientes
function totalClientes() {
    global $conexion;
    $sql = "SELECT COUNT(*) as total FROM clientes";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

// Función para obtener los clientes nuevos de hoy
function nuevosHoy() {
    global $conexion;
    $sql = "SELECT COUNT(*) as total FROM clientes WHERE DATE(fecha_creacion) = CURDATE()";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

// Función para obtener los clientes activos
function clientesActivos() {
    global $conexion;
    $sql = "SELECT COUNT(*) as total FROM clientes WHERE estado = 'active'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}
// Función para obtener los clientes inactivos
function clientesInactivos() {
    global $conexion;
    $sql = "SELECT COUNT(*) as total FROM clientes WHERE estado = 'inactive'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

function obtenerClientes() {
    global $conexion;
    $sql = "SELECT * FROM clientes";
    $result = $conexion->query($sql);
    $clientes = [];
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
    return $clientes;
}

function obtenerClientesFiltrados($busqueda = '', $estado = '', $ciudad = '') {
    global $conexion;
    $sql = "SELECT * FROM clientes WHERE 1";
    $params = [];
    $types = "";

    if ($busqueda != '') {
        $sql .= " AND (nombres LIKE ? OR apellidos LIKE ? OR email LIKE ? OR telefono LIKE ?)";
        $busquedaParam = "%$busqueda%";
        $params[] = $busquedaParam;
        $params[] = $busquedaParam;
        $params[] = $busquedaParam;
        $params[] = $busquedaParam;
        $types .= "ssss";
    }
    if ($estado != '') {
        $sql .= " AND estado = ?";
        $params[] = $estado;
        $types .= "s";
    }
    if ($ciudad != '') {
        $sql .= " AND ciudad = ?";
        $params[] = $ciudad;
        $types .= "s";
    }

    $stmt = $conexion->prepare($sql);
    if (count($params) > 0) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $clientes = [];
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
    $stmt->close();
    return $clientes;
}

//function para obtener un cliente por ID
function obtenerClientePorId($id) {
    global $conexion;
    $sql = "SELECT * FROM clientes WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cliente = $result->fetch_assoc();
    $stmt->close();
    return $cliente;
}

// Función para actualizar un cliente
function actualizarCliente($datos) {
    global $conexion;
    $sql = "UPDATE clientes SET
        nombres = ?, apellidos = ?, cedula = ?, fecha_nacimiento = ?, email = ?, telefono = ?, telefono_alt = ?, estado = ?, direccion = ?, ciudad = ?, barrio = ?, codigo_postal = ?, observaciones = ?
        WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssi",
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
        $datos['observaciones'],
        $datos['id']
    );
    $resultado = $stmt->execute();
    $stmt->close();
    return $resultado;
}
?>