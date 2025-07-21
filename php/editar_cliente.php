<?php
require_once '../model/clienteModelo.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$cliente = null;
$mensaje = '';

if ($id != '') {
    $cliente = obtenerClientePorId($id);
}

if (!$cliente) {
    echo "<p style='text-align:center; color:#888;'>Cliente no encontrado.</p>";
    exit;
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'id' => $id,
        'nombres' => $_POST['nombres'],
        'apellidos' => $_POST['apellidos'],
        'cedula' => $_POST['cedula'],
        'fecha_nacimiento' => $_POST['fecha_nacimiento'],
        'email' => $_POST['email'],
        'telefono' => $_POST['telefono'],
        'telefono_alt' => $_POST['telefono_alt'],
        'estado' => $_POST['estado'],
        'direccion' => $_POST['direccion'],
        'ciudad' => $_POST['ciudad'],
        'barrio' => $_POST['barrio'],
        'codigo_postal' => $_POST['codigo_postal'],
        'observaciones' => $_POST['observaciones']
    ];
    if (actualizarCliente($datos)) {
        header("Location: ver_cliente.php?id=$id&edit=ok");
        exit;
    } else {
        $mensaje = "Error al actualizar el cliente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../css/ver.css">
</head>
<body>
    <div class="detalle-card">
        <h2>Editar Cliente</h2>
        <?php if ($mensaje): ?>
            <div style="color: red; text-align: center;"><?php echo $mensaje; ?></div>
        <?php endif; ?>
        <form method="post">
            <table class="detalle-table">
                <tr><th>Nombres</th><td><input type="text" name="nombres" value="<?php echo htmlspecialchars($cliente['nombres']); ?>" required></td></tr>
                <tr><th>Apellidos</th><td><input type="text" name="apellidos" value="<?php echo htmlspecialchars($cliente['apellidos']); ?>" required></td></tr>
                <tr><th>Cédula</th><td><input type="text" name="cedula" value="<?php echo htmlspecialchars($cliente['cedula']); ?>" required></td></tr>
                <tr><th>Fecha Nacimiento</th><td><input type="date" name="fecha_nacimiento" value="<?php echo htmlspecialchars($cliente['fecha_nacimiento']); ?>"></td></tr>
                <tr><th>Email</th><td><input type="email" name="email" value="<?php echo htmlspecialchars($cliente['email']); ?>"></td></tr>
                <tr><th>Teléfono</th><td><input type="text" name="telefono" value="<?php echo htmlspecialchars($cliente['telefono']); ?>"></td></tr>
                <tr><th>Teléfono Alternativo</th><td><input type="text" name="telefono_alt" value="<?php echo htmlspecialchars($cliente['telefono_alt']); ?>"></td></tr>
                <tr><th>Estado</th>
                    <td>
                        <select name="estado" required>
                            <option value="active" <?php if($cliente['estado']=='active') echo 'selected'; ?>>Activo</option>
                            <option value="inactive" <?php if($cliente['estado']=='inactive') echo 'selected'; ?>>Inactivo</option>
                            <option value="pending" <?php if($cliente['estado']=='pending') echo 'selected'; ?>>Pendiente</option>
                        </select>
                    </td>
                </tr>
                <tr><th>Dirección</th><td><input type="text" name="direccion" value="<?php echo htmlspecialchars($cliente['direccion']); ?>"></td></tr>
                <tr><th>Ciudad</th><td><input type="text" name="ciudad" value="<?php echo htmlspecialchars($cliente['ciudad']); ?>"></td></tr>
                <tr><th>Barrio</th><td><input type="text" name="barrio" value="<?php echo htmlspecialchars($cliente['barrio']); ?>"></td></tr>
                <tr><th>Código Postal</th><td><input type="text" name="codigo_postal" value="<?php echo htmlspecialchars($cliente['codigo_postal']); ?>"></td></tr>
                <tr><th>Observaciones</th><td><textarea name="observaciones"><?php echo htmlspecialchars($cliente['observaciones']); ?></textarea></td></tr>
            </table>
            <button type="submit" class="btn-volver">Guardar Cambios</button>
            <a href="clientes.php" class="btn-volver" style="background:#888;">Cancelar</a>
        </form>
    </div>
</body>
</html>