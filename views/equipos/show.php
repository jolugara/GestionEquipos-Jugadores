<?php
require_once '../../controllers/EquipoController.php';
require_once '../../controllers/JugadorController.php';
require_once '../../models/Jugador.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $equipoController = new EquipoController();
    $equipo = $equipoController->show($id);

    if ($equipo) {
        echo "Nombre: " . $equipo['nombre'] . "<br>";
        echo "Ciudad: " . $equipo['ciudad'] . "<br>";
        echo "Deporte: " . $equipo['deporte'] . "<br>";
        echo "Fecha: " . $equipo['fecha'] . "<br>";

        $jugadores = Jugador::getAllByTeam($id);
        if (!empty($jugadores)) {
            echo "<h2>Jugadores:</h2>";
            echo "<ul>";
            foreach ($jugadores as $jugador) {
                echo "<li>Nombre: " . $jugador->getNombre() . ", Número: " . $jugador->getNumero();
                if ($jugador->getCapitan() == 1) {
                    echo ", Capitán: C";
                }
                echo "</li>";
                echo "<a href='../../views/jugadores/edit.php?id=" . $jugador->getId() . "'>Editar</a><br>";
                echo "<a href='../../controllers/JugadorController.php?action=delete&id=" . $jugador->getId() . "'>Eliminar</a><br>";
            }
            echo "</ul>";
        } else {
            echo "No hay jugadores en este equipo.";
        }
    } else {
        echo "Información del equipo no disponible";
    }  
} else {
    echo "ID del equipo no proporcionado";
}
?>

<a href="../../views/equipos">Volver a la lista de equipos</a>