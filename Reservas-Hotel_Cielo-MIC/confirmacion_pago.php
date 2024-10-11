<?php
session_start(); 

// Verificar si se envían datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['metodo_pago'])) {
    $metodo_pago = $_POST['metodo_pago'];
} else {
    header('Location: pago.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .confirmation-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .details-table th, .details-table td {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="confirmation-header">Confirmación de Pago</h2>
        <h4>Detalles de la Reserva:</h4>
        <table class="table table-bordered details-table">
            <tbody>
                <tr>
                    <th>Nombres:</th>
                    <td><?php echo htmlspecialchars($_SESSION['nombre']); ?></td>
                </tr>
                <tr>
                    <th>Apellidos:</th>
                    <td><?php echo htmlspecialchars($_SESSION['apellido']); ?></td>
                </tr>
                <tr>
                    <th>DNI:</th>
                    <td><?php echo htmlspecialchars($_SESSION['dni']); ?></td>
                </tr>
                <tr>
                    <th>Teléfono:</th>
                    <td><?php echo htmlspecialchars($_SESSION['telefono']); ?></td>
                </tr>
                <tr>
                    <th>Correo Electrónico:</th>
                    <td><?php echo htmlspecialchars($_SESSION['correo']); ?></td>
                </tr>
                <tr>
                    <th>Fecha de Entrada:</th>
                    <td><?php echo htmlspecialchars($_SESSION['fecha_entrada']); ?></td>
                </tr>
                <tr>
                    <th>Fecha de Salida:</th>
                    <td><?php echo htmlspecialchars($_SESSION['fecha_salida']); ?></td>
                </tr>
                <tr>
                    <th>Método de Pago:</th>
                    <td><?php echo htmlspecialchars($metodo_pago); ?></td>
                </tr>
                <tr>
                    <th>Habitación:</th>
                    <td><?php echo isset($_SESSION['habitacion']) ? htmlspecialchars($_SESSION['habitacion']) : 'No disponible'; ?></td>
                </tr>
                <tr>
                    <th>Precio:</th>
                    <td><?php echo isset($_SESSION['precio']) ? htmlspecialchars($_SESSION['precio']) . ' S/' : 'No disponible'; ?></td>
                </tr>
            </tbody>
        </table>

        <div class="alert alert-success" role="alert">
            <strong>¡Gracias por su reserva!</strong> Su pago ha sido procesado con éxito.
        </div>

        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Volver a la Página Principal</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
