<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Principal-LAODCOM</title>
</head>
<body>
    <div class="container">
        <!-- Este es el Sidebar -->
         <aside class="sidebar">
            <div class="logo">
                <h2>LAODCOM</h2>
                <p>Innovacion Tecnologica a tu alcance</p>
            </div>

            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">
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
                        <a href="" class="nav-link">
                            <span class="nav-icon">➕</span>
                            Crear Cliente
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">📈</span>
                            Reportes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">⚙️</span>
                            Configuracion
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Este es el contact del sidebar -->
             <div class="contact-info">
                <h4>Canales de Atencion</h4>
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
                    Lun - Vie: 8:00 AM - 5:00 PM
                </div>
             </div>
         </aside>

         <!-- Este es el panel informativo -->
          <main class="main-content">
            <header class="header">
                <h1>Dashboard Principal</h1>
                <p>Sistema CRUD Clientes - Gestion Integral</p>
            </header>

            <div class="stats-grid">
                <div class="stat-card total">
                    <div class="stat-header">
                        <div class="stat-icon">👥</div>
                        <div class="stat-title">Total Clientes</div>
                    </div>
                    <div class="stat-value">1.247</div>
                    <div class="stat-subtitle">Clientes registrados</div>
                </div>

                <div class="stat-card nuevos">
                    <div class="stat-header">
                        <div class="stat-icon">➕</div>
                        <div class="stat-subtitle">Registros Hoy</div>
                    </div>

                    <div class="stat-card activos">
                        <div class="stat-header">
                            <div class="stat-icon">✅</div>
                            <div class="stat-subtitle">Clientes activos</div>
                        </div>
                    </div>
                    
                    <!--Estas son las acciones-->
                    <div class="actions-section">
                        <div class="actions-header">
                            <h2 class="actions-title">Acciones Rapidas</h2>
                        </div>
                        <div class="actions-grid">
                            <a href="#" class="btn btn-success">
                                <span class="btn-icon">➕</span>
                                Crear Nuevo Cliente
                            </a>
                            <a href="#" class="btn btn-primary">
                                <span class="btn-icon">👥</span>
                                Ver Todos los Clientes
                            </a>
                            <a href="#" class="btn btn-primary">
                                <span class="btn-icon">📊</span>
                                Generar Reporte
                            </a>
                            <a href="#" class="btn btn-primary">
                                <span class="btn-icon">🔍</span>
                                Buscar Cliente
                            </a>
                        </div>
                    </div>
                </div>
            </div>
          </main>
    </div>
</body>
</html>