<?php
require_once '../model/clienteModelo.php';

$total = totalClientes();
$nuevos = nuevosHoy();
$activos = clientesActivos();
$inactivos = clientesInactivos();
$clientes = obtenerClientes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes - LAODCOM</title>
    <link rel="stylesheet" href="../css/clientes.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <h2>LAODCOM</h2>
                <p>Innovación Tecnológica a tu alcance</p>
            </div>

            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <span class="nav-icon">📊</span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="clientes.php" class="nav-link active">
                            <span class="nav-icon">👥</span>
                            Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="crear_cliente.php" class="nav-link">
                            <span class="nav-icon">➕</span>
                            Crear Cliente
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="reporte.php" class="nav-link">
                            <span class="nav-icon">📈</span>
                            Reportes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="configuracion.php" class="nav-link">
                            <span class="nav-icon">⚙️</span>
                            Configuración
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="contact-info">
                <h4>Canales de Atención</h4>
                <div class="contact-item">
                    <span class="contact-icon">📞</span>
                    3001086050
                </div>
                <div class="contact-item">
                    <span class="contact-icon">✉️</span>
                    soporte@laodcom.co
                </div>
                <div class="contact-item">
                    <span class="contact-icon">🕐</span>
                    Lun - Vie: 08:00 AM - 05:00 PM
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-info">
                    <h1>Gestión de Clientes</h1>
                    <p>Administra y controla toda la información de tus clientes</p>
                </div>
                <div class="header-stats">
                    <div class="stat-mini">
                        <div class="stat-mini-value"><?php echo number_format($total);?></div>
                        <div class="stat-mini-label">Total</div>
                    </div>
                    <div class="stat-mini">
                        <div class="stat-mini-value"><?php echo number_format($activos)?></div>
                        <div class="stat-mini-label">Activos</div>
                    </div>
                    <div class="stat-mini">
                        <div class="stat-mini-value"><?php echo number_format($inactivos);?></div>
                        <div class="stat-mini-label">Inactivos</div>
                    </div>
                </div>
            </header>

            <!-- Controles y Filtros -->
            <section class="controls-section">
                <div class="controls-header">
                    <h2 class="controls-title">Filtros y Acciones</h2>
                    <div>
                        <a href="../php/crear_cliente.php" class="btn btn-success">
                            <span class="btn-icon">➕</span>
                            Nuevo Cliente
                        </a>
                        <a href="#" class="btn btn-primary">
                            <span class="btn-icon">📊</span>
                            Exportar
                        </a>
                    </div>
                </div>
                
                <div class="filters-grid">
                    <div class="form-group">
                        <label class="form-label">Buscar Cliente</label>
                        <input type="text" class="form-control" placeholder="Nombre, email o teléfono...">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Estado</label>
                        <select class="form-control">
                            <option value="">Todos los estados</option>
                            <option value="active">Activo</option>
                            <option value="inactive">Inactivo</option>
                            <option value="pending">Pendiente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ciudad</label>
                        <select class="form-control">
                            <option value="">Todas las ciudades</option>
                            <option value="barranquilla">Barranquilla</option>
                            <option value="cartagena">Cartagena</option>
                            <option value="santa-marta">Santa Marta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">&nbsp;</label>
                        <button class="btn btn-primary">
                            <span class="btn-icon">🔍</span>
                            Buscar
                        </button>
                    </div>
                </div>
            </section>

            <!-- Tabla de Clientes -->
            <section class="table-section">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Ciudad</th>
                                <th>Estado</th>
                                <th>Fecha Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientes as $cliente): ?>
                                <tr>
                                    <td><?php echo $cliente['id']; ?></td>
                                    <td><?php echo htmlspecialchars($cliente['nombres'] . ' ' . $cliente['apellidos']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['email']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['ciudad']); ?></td>
                                    <td>
                                        <span class="status-badge status-<?php echo strtolower($cliente['estado']); ?>">
                                            <?php echo ucfirst($cliente['estado']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('d/m/Y', strtotime($cliente['fecha_creacion'])); ?></td>
                                    <td>
                                        <div class="actions-group">
                                            <a href="#" class="btn btn-primary btn-sm"><span class="btn-icon">👁️</span></a>
                                            <a href="#" class="btn btn-warning btn-sm"><span class="btn-icon">✏️</span></a>
                                            <a href="#" class="btn btn-danger btn-sm"><span class="btn-icon">🗑️</span></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
        </main>
    </div>
</body>
</html>