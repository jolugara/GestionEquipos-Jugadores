<?php
require_once '../../controllers/JugadorController.php';
require_once '../../models/Equipo.php';

$equipos = Equipo::getAll();
$jugadorController = new JugadorController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jugadorController->create();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear Jugador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        input[type="text"], input[type="number"], select {
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
            var numero = document.forms["myForm"]["numero"].value;

            if (nombre == "" && numero == "") {
                alert("Al menos uno de nombre o número debe estar presente");
                return false;
            }
        }
    </script>
</head>
<body>
    <a href="../../views/equipos">Volver a la lista de equipos</a>
    <form name="myForm" onsubmit="return validateForm()" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Número: <input type="number" name="numero" required><br>
        Equipo: <select name="equipo" required>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= $equipo->getId() ?>"><?= $equipo->getNombre() ?></option>
            <?php endforeach; ?>
        </select><br>
        Capitán: <input type="checkbox" id="capitan" name="capitan" value="1"><br>
        <input type="submit" value="Crear Jugador">
    </form>
</body>
</html>