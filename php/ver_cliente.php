<?php
require_once '../model/clienteModelo.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$cliente = null;

if ($id != '') {
    $cliente = obtenerClientePorId($id);
}

if (!$cliente) {
    echo "<p style='text-align:center; color:#888;'>Cliente no encontrado.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Cliente</title>
    <link rel="stylesheet" href="../css/ver.css">
</head>
<body>
    <div class="detalle-card">
        <h2>Detalle del Cliente</h2>
        <table class="detalle-table">
            <tr><th>ID</th><td><?php echo $cliente['id']; ?></td></tr>
            <tr><th>Nombres</th><td><?php echo htmlspecialchars($cliente['nombres']); ?></td></tr>
            <tr><th>Apellidos</th><td><?php echo htmlspecialchars($cliente['apellidos']); ?></td></tr>
            <tr><th>Cédula</th><td><?php echo htmlspecialchars($cliente['cedula']); ?></td></tr>
            <tr><th>Fecha Nacimiento</th><td><?php echo htmlspecialchars($cliente['fecha_nacimiento']); ?></td></tr>
            <tr><th>Email</th><td><?php echo htmlspecialchars($cliente['email']); ?></td></tr>
            <tr><th>Teléfono</th><td><?php echo htmlspecialchars($cliente['telefono']); ?></td></tr>
            <tr><th>Teléfono Alternativo</th><td><?php echo htmlspecialchars($cliente['telefono_alt']); ?></td></tr>
            <tr><th>Estado</th><td><?php echo htmlspecialchars($cliente['estado']); ?></td></tr>
            <tr><th>Dirección</th><td><?php echo htmlspecialchars($cliente['direccion']); ?></td></tr>
            <tr><th>Ciudad</th><td><?php echo htmlspecialchars($cliente['ciudad']); ?></td></tr>
            <tr><th>Barrio</th><td><?php echo htmlspecialchars($cliente['barrio']); ?></td></tr>
            <tr><th>Código Postal</th><td><?php echo htmlspecialchars($cliente['codigo_postal']); ?></td></tr>
            <tr><th>Observaciones</th><td><?php echo htmlspecialchars($cliente['observaciones']); ?></td></tr>
            <tr><th>Fecha Registro</th><td><?php echo htmlspecialchars($cliente['fecha_creacion']); ?></td></tr>
        </table>
        <a href="clientes.php" class="btn-volver">Volver</a>
    </div>
</body>
</html>