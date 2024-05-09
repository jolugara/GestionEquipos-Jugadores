<?php
require_once __DIR__ . '/../models/Jugador.php';

class JugadorController {
    public function index() {
        $jugadores = Jugador::getAll();
        return $jugadores;
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $numero = $_POST['numero'];
            $equipo = $_POST['equipo'];
            $capitan = $_POST['capitan'] ?? 0;
    
            $connection = new PDO("mysql:host=localhost;port=3306;dbname=gestion-de-equipos", "root", "");
    
            $sql = "SELECT * FROM jugadores WHERE equipo = :equipo AND capitan = 1";
            $statement = $connection->prepare($sql);
            $statement->execute(['equipo' => $equipo]);
            $existingCapitan = $statement->fetch(PDO::FETCH_OBJ);

            if ($existingCapitan && $capitan) {
                $sql = "UPDATE jugadores SET capitan = 0 WHERE id = :id";
                $statement = $connection->prepare($sql);
                $statement->execute(['id' => $existingCapitan->id]);
            }
    
            $jugador = new Jugador(null, $nombre, $numero, $equipo, $capitan);
            $jugador->save();
    
            header('Location: ../equipos');
            exit();
        }
    }

    public function edit($id) {
        $jugador = Jugador::getById($id);
        $jugador->save();
        header('Location: ../views/equipos');
        exit();
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_GET['id'];
            $jugador = Jugador::getById($id);
            $jugador->nombre = $_POST['nombre'];
            $jugador->numero = $_POST['numero'];
            $jugador->equipo = $_POST['equipo'];
    
            $result = $jugador->save();
            if ($result !== true) {
                $_SESSION['message'] = $result;
            } else {
                $_SESSION['message'] = 'Jugador guardado correctamente';
            }
    
            header('Location: ../../views/equipos');
            exit();
        } else {
            header('Location: ../../views/jugadores/edit.php?id=' . $_GET['id']);
            exit();
        }
    }

    public function delete($id) {
        $jugador = Jugador::getById($id);
        $jugador->delete();
        header('Location: ../views/equipos');
        exit();
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $jugadorController = new JugadorController();
    $jugadorController->delete($_GET['id']);
}

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $jugadorController = new JugadorController();
    $jugadorController->edit($_GET['id']);
}
?>