<?php
require_once '../../controllers/EquipoController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $equipoController = new EquipoController();
    $equipo = $equipoController->show($id);

    if ($equipo) {
        echo "Nombre: " . $equipo['nombre'] . "<br>";
        echo "Ciudad: " . $equipo['ciudad'] . "<br>";
        echo "Deporte: " . $equipo['deporte'] . "<br>";
        echo "Fecha: " . $equipo['fecha'] . "<br>";
    } else {
        echo "Información del equipo no disponible";
    }  
} else {
    echo "ID del equipo no proporcionado";
}