<?php
require_once '../../controllers/EquipoController.php';

$equipoController = new EquipoController();
$equipos = $equipoController->index();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Equipos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            color: #333;
            text-decoration: none;
        }
        a:hover {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <h1>Lista de Equipos</h1>
    <a href="create.php" style="display: inline-block; padding: 10px 20px; border: 2px solid #4CAF50; color: #4CAF50; text-decoration: none; margin-right: 10px;">Crear equipo</a>
    <a href="../jugadores/create.php" style="display: inline-block; padding: 10px 20px; border: 2px solid #4CAF50; color: #4CAF50; text-decoration: none;">Crear jugador</a>
    <hr>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Deporte</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    <?php 
        foreach ($equipos as $equipo): ?>
            <tr>
                <td><?php echo $equipo->getNombre(); ?></td>
                <td><?php echo $equipo->getCiudad(); ?></td>
                <td><?php echo $equipo->getDeporte(); ?></td>
                <td><?php echo $equipo->getFecha(); ?></td>
                <td style="text-align: center;">
                    <a href="show.php?id=<?php echo $equipo->getId(); ?>" style="display: inline-block; padding: 5px 10px; border: 2px solid #4CAF50; color: #4CAF50; text-decoration: none; margin-right: 10px;">Ver detalles</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>