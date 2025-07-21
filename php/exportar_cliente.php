<?php
require_once '../model/clienteModelo.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=clientes.csv');

$output = fopen('php://output', 'w');
fputcsv($output, [
    'ID', 'Nombres', 'Apellidos', 'Cédula', 'Fecha Nacimiento', 'Email', 'Teléfono', 'Teléfono Alt',
    'Estado', 'Dirección', 'Ciudad', 'Barrio', 'Código Postal', 'Observaciones', 'Fecha Registro'
]);

$clientes = obtenerClientes();
foreach ($clientes as $cliente) {
    fputcsv($output, [
        $cliente['id'],
        $cliente['nombres'],
        $cliente['apellidos'],
        $cliente['cedula'],
        $cliente['fecha_nacimiento'],
        $cliente['email'],
        $cliente['telefono'],
        $cliente['telefono_alt'],
        $cliente['estado'],
        $cliente['direccion'],
        $cliente['ciudad'],
        $cliente['barrio'],
        $cliente['codigo_postal'],
        $cliente['observaciones'],
        $cliente['fecha_creacion']
    ]);
}
fclose($output);
exit;