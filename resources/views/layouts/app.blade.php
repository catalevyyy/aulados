<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AulaDOS - Sistema de Gestión ESIM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --esim-primary: #2C3E50;
            --esim-secondary: #3498DB;
            --esim-accent: #E74C3C;
            --esim-light: #ECF0F1;
            --esim-dark: #2C3E50;
        }
        
        body {
            background: linear-gradient(135deg, var(--esim-light) 0%, #FFFFFF 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--esim-primary) 0%, var(--esim-secondary) 100%);
            color: white;
            border-radius: 20px;
            margin-top: 2rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .feature-card {
            background: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--esim-secondary), var(--esim-primary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 1.8rem;
        }
        
        .btn-esim {
            background: linear-gradient(135deg, var(--esim-secondary), var(--esim-primary));
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-esim:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.3);
            color: white;
        }
        
        .btn-outline-esim {
            border: 2px solid var(--esim-secondary);
            color: var(--esim-secondary);
            background: transparent;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-esim:hover {
            background: var(--esim-secondary);
            color: white;
            transform: translateY(-2px);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--esim-secondary), var(--esim-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: var(--esim-primary);">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-graduation-cap me-2"></i>AulaDOS
            </a>
            <div class="navbar-nav ms-auto">
                @auth
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="hero-section p-5 text-center my-5">
                    <h1 class="display-4 fw-bold mb-3">Sistema de Gestión de Aulas</h1>
                    <p class="lead mb-4">Plataforma integral para la administración académica de ESIM</p>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg px-4 me-md-3">
                                <i class="fas fa-tachometer-alt me-2"></i>Ir al Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4 me-md-3">
                                <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">
                                <i class="fas fa-user-plus me-2"></i>Registrarse
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="row text-center g-4 mb-5">
            <div class="col-md-4">
                <div class="feature-card p-4">
                    <div class="feature-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Gestión de Aulas</h4>
                    <p class="text-muted">Administra capacidad, ubicación y características de cada espacio académico</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-4">
                    <div class="feature-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Materias y Docentes</h4>
                    <p class="text-muted">Gestiona el plan académico y su relación con el cuerpo docente</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-4">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Reservas Inteligentes</h4>
                    <p class="text-muted">Sistema de reservas con verificación de disponibilidad en tiempo real</p>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="row text-center mb-5">
            <div class="col-12">
                <div class="p-4 rounded" style="background: rgba(52, 152, 219, 0.1);">
                    <h3 class="mb-4">Nuestra Plataforma en Números</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="stat-number">50+</div>
                            <p>Aulas Activas</p>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-number">120+</div>
                            <p>Materias</p>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-number">80+</div>
                            <p>Docentes</p>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-number">500+</div>
                            <p>Reservas Mensuales</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4" style="background: var(--esim-primary); color: white;">
        <div class="container">
            <p class="mb-0">Sistema desarrollado para ESIM - © 2024 AulaDOS</p>
            <small>Acceso exclusivo para cuentas @esim.edu.ar</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>