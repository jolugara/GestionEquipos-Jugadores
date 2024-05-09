<?php
require_once '../../controllers/EquipoController.php';

$equipoController = new EquipoController();
$equipos = $equipoController->create();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Equipo</title>
    <script>
        function validateForm() {
            var nombre = document.forms["myForm"]["nombre"].value;
            var ciudad = document.forms["myForm"]["ciudad"].value;
            var deporte = document.forms["myForm"]["deporte"].value;

            if (nombre == "" && ciudad == "" && deporte == "") {
                alert("Al menos uno de nombre, ciudad o deporte debe estar presente");
                return false;
            }
        }
    </script>
</head>
<body>
    <form name="myForm" onsubmit="return validateForm()" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Ciudad: <input type="text" name="ciudad" required><br>
        Deporte: <select name="deporte" required>
            <option value="Fútbol">Fútbol</option>
            <option value="Baloncesto">Baloncesto</option>
            <option value="Tenis">Tenis</option>
        </select><br>
        Fecha: <input type="date" name="fecha" required><br>
        <input type="submit" value="Crear Equipo">
    </form>
</body>
</html>