<?php
session_start(); 


if (!isset($_SESSION['nombre'])) {
    header('Location: formulario_reserva.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Método de Pago</h2>
        <form action="confirmacion_pago.php" method="post">
            <div class="form-group">
                <label for="metodo_pago">Seleccione un método de pago:</label>
                <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                    <option value="">Seleccione...</option>
                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Efectivo">Efectivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Confirmar Pago</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
