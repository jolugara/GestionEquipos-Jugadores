<?php
class Equipo {
    private $id;
    private $nombre;
    private $ciudad;
    private $deporte;
    private $fecha;

    public function __construct($id, $nombre, $ciudad, $deporte, $fecha) {
        if(empty($nombre) && empty($ciudad) && empty($deporte)) {
            throw new InvalidArgumentException('Al menos uno de nombre, ciudad o deporte debe estar presente');
        }

        $this->id = $id;
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
        $this->deporte = $deporte;
        $this->fecha = $fecha;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function getDeporte() {
        return $this->deporte;
    }

    public function getFecha() {
        return $this->fecha;
    }
    
    public function save() {
        if(empty($this->nombre) && empty($this->ciudad) && empty($this->deporte)) {
            throw new InvalidArgumentException('Al menos uno de nombre, ciudad o deporte debe estar presente');
        }
        
        $connection = new PDO("mysql:host=localhost;port=3306;dbname=gestion-de-equipos", "root", "");
        $sql = "INSERT INTO equipos (nombre, ciudad, deporte, fecha) VALUES (:nombre, :ciudad, :deporte, :fecha)";
        $statement = $connection->prepare($sql);
        $statement->execute([
            'nombre' => $this->nombre,
            'ciudad' => $this->ciudad,
            'deporte' => $this->deporte,
            'fecha' => $this->fecha
        ]);
        $this->id = $connection->lastInsertId();
    }
    
    public static function getAll() {
        $connection = new PDO("mysql:host=localhost;port=3306;dbname=gestion-de-equipos", "root", "");
        $sql = "SELECT * FROM equipos";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        $equipos = [];
        foreach ($result as $row) {
            $equipo = new Equipo($row['id'], $row['nombre'], $row['ciudad'], $row['deporte'], $row['fecha']);
            $equipos[] = $equipo;
        }
    
        return $equipos;
    }
    
    public static function getById($id) {
        $connection = new PDO("mysql:host=localhost;port=3306;dbname=gestion-de-equipos", "root", "");
        $sql = "SELECT * FROM equipos WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
?>
