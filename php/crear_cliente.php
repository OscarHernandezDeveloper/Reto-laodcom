<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente - LAODCOM</title>
    <link rel="stylesheet" href="../css/crear_cliente.css">
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
                        <a href="clientes.php" class="nav-link">
                            <span class="nav-icon">👥</span>
                            Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="crear_cliente.php" class="nav-link active">
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
                <h1>Crear Nuevo Cliente</h1>
                <p>Registra la información completa del nuevo cliente en el sistema</p>
                <nav class="breadcrumb">
                    <a href="#">Dashboard</a>
                    <span class="breadcrumb-separator">›</span>
                    <a href="#">Clientes</a>
                    <span class="breadcrumb-separator">›</span>
                    <span>Crear Cliente</span>
                </nav>
            </header>

            <!-- Formulario -->
            <div class="form-container">
                <div class="form-header">
                    <h2 class="form-title">Información del Cliente</h2>
                    <p class="form-subtitle">Complete todos los campos marcados con (*) para registrar el cliente</p>
                </div>

                <form id="clienteForm" method="POST" action="#">
                    <div class="form-grid">
                        <!-- Información Personal -->
                        <div class="form-section">
                            <h3 class="section-title">
                                <span class="section-icon">👤</span>
                                Información Personal
                            </h3>

                            <div class="form-group">
                                <label for="nombres" class="form-label required">Nombres</label>
                                <div class="input-group">
                                    <span class="input-icon">👤</span>
                                    <input type="text" id="nombres" name="nombres" class="form-control" 
                                           placeholder="Ingrese los nombres" required>
                                </div>
                                <div class="form-error">Por favor ingrese los nombres del cliente</div>
                            </div>

                            <div class="form-group">
                                <label for="apellidos" class="form-label required">Apellidos</label>
                                <div class="input-group">
                                    <span class="input-icon">👤</span>
                                    <input type="text" id="apellidos" name="apellidos" class="form-control" 
                                           placeholder="Ingrese los apellidos" required>
                                </div>
                                <div class="form-error">Por favor ingrese los apellidos del cliente</div>
                            </div>

                            <div class="form-group">
                                <label for="cedula" class="form-label required">Cédula</label>
                                <div class="input-group">
                                    <span class="input-icon">🆔</span>
                                    <input type="text" id="cedula" name="cedula" class="form-control" 
                                           placeholder="Ej: 1234567890" pattern="[0-9]{8,12}" required>
                                </div>
                                <div class="form-help">Solo números, entre 8 y 12 dígitos</div>
                                <div class="form-error">Por favor ingrese una cédula válida</div>
                            </div>

                            <div class="form-group">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <span class="input-icon">📅</span>
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Información de Contacto -->
                        <div class="form-section">
                            <h3 class="section-title">
                                <span class="section-icon">📞</span>
                                Información de Contacto
                            </h3>

                            <div class="form-group">
                                <label for="email" class="form-label required">Email</label>
                                <div class="input-group">
                                    <span class="input-icon">✉️</span>
                                    <input type="email" id="email" name="email" class="form-control" 
                                           placeholder="ejemplo@email.com" required>
                                </div>
                                <div class="form-error">Por favor ingrese un email válido</div>
                            </div>

                            <div class="form-group">
                                <label for="telefono" class="form-label required">Teléfono</label>
                                <div class="input-group">
                                    <span class="input-icon">📱</span>
                                    <input type="tel" id="telefono" name="telefono" class="form-control" 
                                           placeholder="+57 300 123 4567" pattern="[+]?[0-9\s-()]{10,15}" required>
                                </div>
                                <div class="form-help">Incluya código de país y área</div>
                                <div class="form-error">Por favor ingrese un teléfono válido</div>
                            </div>

                            <div class="form-group">
                                <label for="telefono_alt" class="form-label">Teléfono Alternativo</label>
                                <div class="input-group">
                                    <span class="input-icon">📞</span>
                                    <input type="tel" id="telefono_alt" name="telefono_alt" class="form-control" 
                                           placeholder="+57 300 123 4567 (opcional)">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="estado" class="form-label required">Estado</label>
                                <select id="estado" name="estado" class="form-control" required>
                                    <option value="">Seleccione un estado</option>
                                    <option value="active">Activo</option>
                                    <option value="inactive">Inactivo</option>
                                    <option value="pending">Pendiente</option>
                                </select>
                                <div class="form-error">Por favor seleccione un estado</div>
                            </div>
                        </div>
                    </div>

                    <!-- Información de Ubicación -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <span class="section-icon">📍</span>
                            Información de Ubicación
                        </h3>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="direccion" class="form-label required">Dirección</label>
                                <div class="input-group">
                                    <span class="input-icon">🏠</span>
                                    <input type="text" id="direccion" name="direccion" class="form-control" 
                                           placeholder="Calle, carrera, número..." required>
                                </div>
                                <div class="form-error">Por favor ingrese la dirección</div>
                            </div>

                            <div class="form-group">
                                <label for="ciudad" class="form-label required">Ciudad</label>
                                <select id="ciudad" name="ciudad" class="form-control" required>
                                    <option value="">Seleccione una ciudad</option>
                                    <option value="barranquilla">Barranquilla</option>
                                    <option value="cartagena">Cartagena</option>
                                    <option value="santa-marta">Santa Marta</option>
                                    <option value="valledupar">Valledupar</option>
                                    <option value="monteria">Montería</option>
                                    <option value="sincelejo">Sincelejo</option>
                                </select>
                                <div class="form-error">Por favor seleccione una ciudad</div>
                            </div>

                            <div class="form-group">
                                <label for="barrio" class="form-label">Barrio</label>
                                <div class="input-group">
                                    <span class="input-icon">🏘️</span>
                                    <input type="text" id="barrio" name="barrio" class="form-control" 
                                           placeholder="Nombre del barrio (opcional)">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="codigo_postal" class="form-label">Código Postal</label>
                                <div class="input-group">
                                    <span class="input-icon">📮</span>
                                    <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" 
                                           placeholder="080001" pattern="[0-9]{5,6}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información Adicional -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <span class="section-icon">📝</span>
                            Información Adicional
                        </h3>

                        <div class="form-group">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea id="observaciones" name="observaciones" class="form-control" 
                                      rows="4" placeholder="Notas o comentarios adicionales sobre el cliente..."></textarea>
                        </div>

                    <!-- Botones de acción -->
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary">
                            <span class="btn-icon">❌</span>
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-success">
                            <span class="btn-icon">✅</span>
                            Crear Cliente
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>