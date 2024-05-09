<?php
require_once '../../controllers/EquipoController.php';

$equipoController = new EquipoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $equipoController->create();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear Equipo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        input[type="text"], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="date"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid #4CAF50;
            color: #4CAF50;
            text-decoration: none;
            margin-bottom: 20px;
        }
    </style>
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
    <a href="../../views/equipos">Volver a la lista de equipos</a>
    <form name="myForm" onsubmit="return validateForm()" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Ciudad: <input type="text" name="ciudad" required><br>
        Deporte: <select name="deporte" required>
            <option value="Fútbol">Fútbol</option>
            <option value="Baloncesto">Baloncesto</option>
            <option value="Voleibol">Voleibol</option>
        </select><br>
        Fecha de creación: <input type="date" name="fecha" required><br>
        <input type="submit" value="Crear Equipo">
    </form>
</body>
</html>