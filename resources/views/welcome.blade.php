<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Aulas - ESIM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-50 via-white to-yellow-50 text-gray-800 font-sans min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="fixed w-full top-0 backdrop-blur-md bg-white/80 shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <div class="bg-gradient-to-r from-green-500 to-yellow-500 p-2 rounded-lg mr-3">
                    <i class="fas fa-chalkboard text-white"></i>
                </div>
                <h1 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-yellow-500">
                    Gestión de Aulas ESIM
                </h1>
            </div>
            
            <div class="hidden md:flex space-x-6">
                <a href="#" class="text-gray-600 hover:text-green-600 transition font-medium">Inicio</a>
                <a href="#features" class="text-gray-600 hover:text-green-600 transition font-medium">Funciones</a>
                <a href="#about" class="text-gray-600 hover:text-green-600 transition font-medium">Nosotros</a>
            </div>
            
            <div class="flex space-x-3">
                <a href="{{ url('/login') }}" class="px-4 py-2 rounded-lg font-medium border border-green-500 text-green-600 hover:bg-green-50 transition">
                    Ingresar
                </a>
                <a href="{{ url('/register') }}" class="px-4 py-2 rounded-lg font-medium bg-gradient-to-r from-green-500 to-yellow-500 text-white shadow hover:opacity-90 transition">
                    Registrarse
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-16 text-center max-w-4xl mx-auto px-6 mt-4">
        <div class="mb-6">
            <span class="inline-block bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full">
                <i class="fas fa-graduation-cap mr-2"></i>Exclusivo @esim.edu.ar
            </span>
        </div>
        
        <h2 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight text-gray-900">
            Moderniza la <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-yellow-500">gestión educativa</span>
        </h2>
        
        <p class="text-lg text-gray-600 mb-10">
            Sistema integral para administrar aulas, materias, docentes y reservas académicas. 
            Diseñado específicamente para instituciones educativas.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ url('/dashboard') }}" class="px-8 py-4 bg-gradient-to-r from-green-500 to-yellow-500 text-white text-lg font-semibold rounded-xl shadow-lg hover:scale-105 transition transform">
                <i class="fas fa-tachometer-alt mr-2"></i> Ir al Panel
            </a>
            <a href="#features" class="px-8 py-4 border border-green-500 text-green-600 text-lg font-semibold rounded-xl hover:bg-green-500 hover:text-white transition">
                <i class="fas fa-info-circle mr-2"></i> Saber más
            </a>
        </div>
    </section>

    <!-- Stats Section -->
    <div class="max-w-5xl mx-auto px-6 py-8 grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white/80 backdrop-blur p-4 rounded-xl shadow text-center">
            <div class="text-2xl font-bold text-green-600">50+</div>
            <div class="text-sm text-gray-600">Aulas activas</div>
        </div>
        <div class="bg-white/80 backdrop-blur p-4 rounded-xl shadow text-center">
            <div class="text-2xl font-bold text-green-600">120+</div>
            <div class="text-sm text-gray-600">Materias</div>
        </div>
        <div class="bg-white/80 backdrop-blur p-4 rounded-xl shadow text-center">
            <div class="text-2xl font-bold text-green-600">80+</div>
            <div class="text-sm text-gray-600">Docentes</div>
        </div>
        <div class="bg-white/80 backdrop-blur p-4 rounded-xl shadow text-center">
            <div class="text-2xl font-bold text-green-600">500+</div>
            <div class="text-sm text-gray-600">Reservas mensuales</div>
        </div>
    </div>

    <!-- Features -->
    <section id="features" class="max-w-6xl mx-auto py-16 grid grid-cols-1 md:grid-cols-3 gap-8 px-6">
        <div class="bg-white card-hover p-8 rounded-2xl shadow border border-gray-100">
            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-5">
                <i class="fas fa-door-open text-green-600 text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3 text-green-700">Gestión de Aulas</h3>
            <p class="text-gray-600">Administra capacidad, recursos y estado de cada aula con una interfaz intuitiva.</p>
        </div>
        
        <div class="bg-white card-hover p-8 rounded-2xl shadow border border-gray-100">
            <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center mb-5">
                <i class="fas fa-book text-yellow-600 text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3 text-yellow-700">Materias y Docentes</h3>
            <p class="text-gray-600">Organiza el plan académico y asigna docentes de manera eficiente.</p>
        </div>
        
        <div class="bg-white card-hover p-8 rounded-2xl shadow border border-gray-100">
            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-5">
                <i class="fas fa-calendar-check text-green-600 text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3 text-green-700">Reservas Inteligentes</h3>
            <p class="text-gray-600">Sistema de reservas con detección de conflictos y notificaciones automáticas.</p>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 text-center bg-gradient-to-r from-green-600 to-yellow-500 text-white px-6 mt-8">
        <div class="max-w-3xl mx-auto">
            <h3 class="text-3xl font-bold mb-6">Innovación en gestión educativa</h3>
            <p class="text-lg opacity-90 mb-6">
                Pàgina creada por la crack de Cata para gestionar las aulas 
                desde la comodidad de tu super computadora.
            </p>
            <div class="bg-white/20 p-4 rounded-xl max-w-md mx-auto">
                <p class="flex items-center justify-center font-semibold">
                    <i class="fas fa-shield-check mr-2"></i> Acceso exclusivo con @esim.edu.ar
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white mt-auto border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center">
                        <div class="bg-gradient-to-r from-green-500 to-yellow-500 p-2 rounded-lg mr-3">
                            <i class="fas fa-chalkboard text-white"></i>
                        </div>
                        <span class="font-bold text-green-600">Gestión de Aulas ESIM</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Sistema de administración académica</p>
                </div>
                
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-green-600">
                        <i class="fab fa-facebook text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-green-600">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-green-600">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                </div>
            </div>
            
            <div class="border-t border-gray-100 mt-6 pt-6 text-center">
                <p class="text-sm text-gray-500">&copy; 2023 ESIM - Gestión de Aulas. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

</body>
</html>