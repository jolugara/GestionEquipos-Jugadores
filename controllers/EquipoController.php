<?php
require_once __DIR__ . '/../models/Equipo.php';

class EquipoController {
    public function index() {
        $equipos = Equipo::getAll();
        return $equipos;
    }
    
    public function show($id) {
        $equipo = Equipo::getById($id);
        return $equipo;
    }
    
    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $ciudad = $_POST["ciudad"];
            $deporte = $_POST["deporte"];
            $fecha = $_POST["fecha"];
    
            $equipo = new Equipo($nombre, $ciudad, $deporte, $fecha);
            $equipo->save();

            header('Location: ../equipos');
            exit();
        }
    }
    
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $ciudad = $_POST['ciudad'];
            $deporte = $_POST['deporte'];
            $fecha = $_POST['fecha'];
    
            if(empty($nombre) && empty($ciudad) && empty($deporte)) {
                header('Location: /path/to/create.php?error=Al menos uno de nombre, ciudad o deporte debe estar presente');
                exit();
            }
    
            $equipo = new Equipo($nombre, $ciudad, $deporte, $fecha);
            $equipo->save();
            header('Location: /path/to/show.php?id=' . $equipo->getId());
            exit();
        }
    }
}
?>
