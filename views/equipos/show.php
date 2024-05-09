<?php
require_once '../../controllers/EquipoController.php';
require_once '../../controllers/JugadorController.php';
require_once '../../models/Jugador.php';

echo '<style>
body {
    font-family: Arial, sans-serif;
}
table {
    width: 60%;
    margin: 20px auto;
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
a {
    display: inline-block;
    padding: 5px 10px;
    border: 2px solid #4CAF50;
    color: #4CAF50;
    text-decoration: none;
    margin-right: 10px;
}
</style>';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $equipoController = new EquipoController();
    $equipo = $equipoController->show($id);

    if ($equipo) {
        echo "<h2>Informacion del equipo:</h2>";
        echo "<table>";
        echo "<tr><th>Nombre</th><td>" . $equipo['nombre'] . "</td></tr>";
        echo "<tr><th>Ciudad</th><td>" . $equipo['ciudad'] . "</td></tr>";
        echo "<tr><th>Deporte</th><td>" . $equipo['deporte'] . "</td></tr>";
        echo "<tr><th>Fecha</th><td>" . $equipo['fecha'] . "</td></tr>";
        echo "</table>";

        $jugadores = Jugador::getAllByTeam($id);
        if (!empty($jugadores)) {
            echo "<h2>Jugadores:</h2>";
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Número</th><th>Capitán</th><th>Acciones</th></tr>";
            foreach ($jugadores as $jugador) {
                echo "<tr>";
                echo "<td>" . $jugador->getNombre() . "</td>";
                echo "<td>" . $jugador->getNumero() . "</td>";
                echo "<td>" . ($jugador->getCapitan() == 1 ? "C" : "") . "</td>";
                echo "<td>";
                echo "<a href='../../views/jugadores/edit.php?id=" . $jugador->getId() . "'>Editar</a> | ";
                echo "<a href='../../controllers/JugadorController.php?action=delete&id=" . $jugador->getId() . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
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