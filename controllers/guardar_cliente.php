<?php
require_once '../model/clienteModelo.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['cedula']) && !empty($_POST['cedula'])) {
        $datos = [
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

        // Verificar si la cédula ya existe
        if (existeCedula($datos['cedula'])) { // Debes implementar esta función en clienteModelo.php
            echo "<script>
                alert('La cédula ya existe. Por favor ingrese otra.');
                window.location.href = '../php/crear_cliente.php';
            </script>";
            exit;
        }

        // Guardar el cliente
        $resultado = guardarCliente($datos); // Debes tener esta función en clienteModelo.php

        if ($resultado) {
            echo "<script>
                alert('Cliente creado con éxito');
                window.location.href = '../php/crear_cliente.php';
            </script>";
            exit;
        } else {
            echo "<script>
                alert('Error al crear el cliente');
                window.location.href = '../php/crear_cliente.php';
            </script>";
            exit;
        }
    }
}
?>