<?php
session_start();

$mensaje = '';

// Capturar los datos de la URL
$habitacion = isset($_GET['habitacion']) ? $_GET['habitacion'] : '';
$precio = isset($_GET['precio']) ? $_GET['precio'] : '';

// Verificar si se envían datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Guardar datos en sesión
    $_SESSION['nombre'] = $_POST['nombre'] ?? '';
    $_SESSION['apellido'] = $_POST['apellido'] ?? '';
    $_SESSION['dni'] = $_POST['dni'] ?? '';
    $_SESSION['codigo_postal'] = $_POST['codigo_postal'] ?? '';
    $_SESSION['telefono'] = $_POST['telefono'] ?? '';
    $_SESSION['correo'] = $_POST['correo'] ?? '';
    $_SESSION['fecha_entrada'] = $_POST['fecha_entrada'] ?? '';
    $_SESSION['fecha_salida'] = $_POST['fecha_salida'] ?? '';
    $_SESSION['habitacion'] = $habitacion; 
    $_SESSION['precio'] = $precio; 
    // Procesar reserva
    if (isset($_POST['procesar'])) {
        header('Location: pago.php');
        exit();
    }

    // Guardar datos
    if (isset($_POST['guardar'])) {
        $mensaje = "Datos guardados: " . htmlspecialchars($_SESSION['nombre']);
    }

    // Editar datos
    if (isset($_POST['editar'])) {
        $mensaje = "Datos editados: " . htmlspecialchars($_SESSION['nombre']);
    }
}

// Recuperar datos de sesión
$nombre = $_SESSION['nombre'] ?? '';
$apellido = $_SESSION['apellido'] ?? '';
$dni = $_SESSION['dni'] ?? '';
$codigo_postal = $_SESSION['codigo_postal'] ?? '';
$telefono = $_SESSION['telefono'] ?? '';
$correo = $_SESSION['correo'] ?? '';
$fecha_entrada = $_SESSION['fecha_entrada'] ?? '';
$fecha_salida = $_SESSION['fecha_salida'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Detalles de la Reserva</h2>

        <!-- Mostrar mensaje si existe -->
        <?php if ($mensaje): ?>
            <div class="alert alert-success">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="habitacion">Habitación</label>
                <input type="text" class="form-control" id="habitacion" name="habitacion" value="<?php echo htmlspecialchars($habitacion); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="<?php echo htmlspecialchars($precio); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombres</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellidos</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($apellido); ?>" required>
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="tel" class="form-control" id="dni" name="dni" value="<?php echo htmlspecialchars($dni); ?>" required pattern="\d*" title="Solo se permiten números">
            </div>
            <div class="form-group">
                <label for="codigo_postal">Código Postal</label>
                <input type="tel" class="form-control" id="codigo_postal" name="codigo_postal" value="<?php echo htmlspecialchars($codigo_postal); ?>" required pattern="\d*" title="Solo se permiten números">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>" required pattern="\d*" title="Solo se permiten números">
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_entrada">Fecha de Entrada</label>
                <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" value="<?php echo htmlspecialchars($fecha_entrada); ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_salida">Fecha de Salida</label>
                <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" value="<?php echo htmlspecialchars($fecha_salida); ?>" required>
            </div>

            <h4>Datos de Reserva</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Código Postal</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Fecha de Entrada</th>
                        <th>Fecha de Salida</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($nombre); ?></td>
                        <td><?php echo htmlspecialchars($apellido); ?></td>
                        <td><?php echo htmlspecialchars($dni); ?></td>
                        <td><?php echo htmlspecialchars($codigo_postal); ?></td>
                        <td><?php echo htmlspecialchars($telefono); ?></td>
                        <td><?php echo htmlspecialchars($correo); ?></td>
                        <td><?php echo htmlspecialchars($fecha_entrada); ?></td>
                        <td><?php echo htmlspecialchars($fecha_salida); ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <button type="submit" name="guardar" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <button type="submit" name="editar" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </button>
                <button type="submit" name="procesar" class="btn btn-primary">
                    Procesar Reserva <i class="fas fa-check-circle"></i>
                </button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
