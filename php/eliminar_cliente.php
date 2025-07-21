<?php
require_once '../model/clienteModelo.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id != '') {
    eliminarCliente($id);
}

header('Location: clientes.php');
exit;

// --- En tu modelo (clienteModelo.php) ---
function eliminarCliente($id) {
    global $conexion;
    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}