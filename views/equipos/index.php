<?php
require_once '../../controllers/EquipoController.php';

$equipoController = new EquipoController();
$equipos = $equipoController->index();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Equipos</title>
    <a href="create.php">Crear equipo</a>
</head>
<body>
    <h1>Lista de Equipos</h1>
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
                <td>
                    <a href="show.php?id=<?php echo $equipo->getId(); ?>">Ver detalles</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>