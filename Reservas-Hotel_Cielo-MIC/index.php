<?php
session_start(); 

$nombre_usuario_valido = "admin"; 
$contraseña_valida = "123"; 

$error = ""; 

// Comprobar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['username']; 
    $contraseña = $_POST['password']; 

    // Validar las credenciales
    if ($nombre_usuario === $nombre_usuario_valido && $contraseña === $contraseña_valida) {
        $_SESSION['nombre_usuario'] = $nombre_usuario; 
   
        header("Location: formulario_reserva.php?habitacion=" . urlencode($_POST['habitacion']) . "&precio=" . $_POST['precio']);
        exit();
    } else {
        $error = "Nombre de usuario o contraseña incorrectos."; 
    }
}


$habitacion_seleccionada = "";
$precio_habitacion = 0;

// Verificar si se seleccionó una habitación
if (isset($_GET['habitacion']) && isset($_GET['precio'])) {
    $habitacion_seleccionada = $_GET['habitacion'];
    $precio_habitacion = $_GET['precio'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos al Hostal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
            color: #343a40; 
        }
        .header {
            background-color: #007bff; 
            color: white;
            padding: 20px 0;
            text-align: center;
            border-radius: 0 0 15px 15px;
        }
        .room-card {
            margin-bottom: 20px;
        }
        .room-card img {
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0; 
        }
        .card-body {
            background-color: #ffffff; 
            border-radius: 0 0 10px 10px; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
        }
        .btn-primary {
            background-color: #28a745; 
            border: none;
        }
        .btn-primary:hover {
            background-color: #218838; 
        }
        .contact-card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        footer {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bienvenidos al Hostal el Cielo</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            <!-- Primera habitación -->
            <div class="col-md-3 room-card">
                <div class="card">
                    <img src="https://casa-cielo.lima-hotels-pe.com/data/Photos/OriginalPhoto/5012/501229/501229908/lima-casa-cielo-hotel-photo-64.JPEG" class="card-img-top" alt="Habitación 1">
                    <div class="card-body">
                        <h5 class="card-title">Habitación del Hostal el cielo</h5>
                        <p class="card-text">Descripción breve de la habitación.</p>
                        <p><strong>Precio: S/ 130</strong></p>
                        <p><strong>Calificación: 8.5 Muy bueno (75)</strong></p>
                        <p>Desayuno gratis | Cancelación gratis</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" onclick="setHabitacion('Habitación del Hostal el cielo', 130)">Reservar</a>
                    </div>
                </div>
            </div>
            <!-- Segunda habitación -->
            <div class="col-md-3 room-card">
                <div class="card">
                    <img src="https://images.trvl-media.com/lodging/26000000/25740000/25733600/25733568/d826f82f.jpg?impolicy=fcrop&w=1200&h=800&p=1&q=medium" class="card-img-top" alt="Habitación 2">
                    <div class="card-body">
                        <h5 class="card-title">Suite Familiar del Hostal el cielo</h5>
                        <p class="card-text">Amplia habitación con vista al mar.</p>
                        <p><strong>Precio: S/ 200</strong></p>
                        <p><strong>Calificación: 9.0 Excelente (50)</strong></p>
                        <p>Desayuno gratis | Cancelación gratis</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" onclick="setHabitacion('Suite Familiar del Hostal el cielo', 200)">Reservar</a>
                    </div>
                </div>
            </div>
            <!-- Tercera habitación -->
            <div class="col-md-3 room-card">
                <div class="card">
                    <img src="https://www.hostaldrosas.com/wp-content/uploads/2018/03/doble1-751x563.jpeg" class="card-img-top" alt="Habitación 3">
                    <div class="card-body">
                        <h5 class="card-title">Habitación Doble del Hostal el cielo</h5>
                        <p class="card-text">Ideal para parejas con todas las comodidades.</p>
                        <p><strong>Precio: S/ 150</strong></p>
                        <p><strong>Calificación: 8.0 Muy bueno (30)</strong></p>
                        <p>Desayuno gratis | Cancelación gratis</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" onclick="setHabitacion('Habitación Doble del Hostal el cielo', 150)">Reservar</a>
                    </div>
                </div>
            </div>
            <!-- Cuarta habitación -->
            <div class="col-md-3 room-card">
                <div class="card">
                    <img src="https://aventuras.pe/public/img/galerias/habitacion-matrimonial-hotel-cielo-tarapoto-41b3a95743.jpg" class="card-img-top" alt="Habitación 4">
                    <div class="card-body">
                        <h5 class="card-title">Habitación Simple Hostal el cielo</h5>
                        <p class="card-text">Perfecta para una estancia tranquila.</p>
                        <p><strong>Precio: S/ 100</strong></p>
                        <p><strong>Calificación: 8.8 Muy bueno (40)</strong></p>
                        <p>Desayuno gratis | Cancelación gratis</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" onclick="setHabitacion('Habitación Simple Hostal el cielo', 100)">Reservar</a>
                    </div>
                </div>
            </div>
        </div>


      <!-- CONTACTACNOS  -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Contáctanos</h2>
                <div class="contact-card p-4">
                    <h5>Dirección:</h5>
                    <p>Av. Victor Larco, Trujillo, Perú</p>
                    <h5>Teléfono:</h5>
                    <p>(+51) 926 870 390</p>
                    <h5>Email:</h5>
                    <p>info@hostalelcielo.com</p>
                    <h5>Horario de atención:</h5>
                    <p>Lunes a Domingo: 9:00 am - 12:00 pm</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de inicio de sesion -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <label for="username">Nombre de usuario</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <input type="hidden" id="habitacion" name="habitacion" value="">
                        <input type="hidden" id="precio" name="precio" value="">
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <span>&copy; 2024 Hostal el Cielo. Todos los derechos reservados.</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function setHabitacion(habitacion, precio) {
            document.getElementById('habitacion').value = habitacion;
            document.getElementById('precio').value = precio;
        }
    </script>
</body>
</html>
