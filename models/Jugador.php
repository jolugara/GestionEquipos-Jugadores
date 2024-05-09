<?php
class Jugador {
    private $id;
    private $nombre;
    private $numero;
    private $equipo;
    private $capitan;

    public function __construct($id, $nombre, $numero, $equipo, $capitan) {
        if(empty($nombre) && empty($numero)) {
            throw new InvalidArgumentException('Al menos uno de nombre o número debe estar presente');
        }

        $this->id = $id;
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->equipo = $equipo;
        $this->capitan = $capitan;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getEquipo() {
        return $this->equipo;
    }

    public function getCapitan() {
        return $this->capitan;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setEquipo($equipo) {
        $this->equipo = $equipo;
    }

    public function save() {
        if(empty($this->nombre) && empty($this->numero)) {
            return 'Al menos uno de nombre o número debe estar presente';
        }
    
        $connection = new PDO("mysql:host=localhost;port=3306;dbname=gestion-de-equipos", "root", "");
    
        $sql = "SELECT * FROM jugadores WHERE numero = :numero AND equipo = :equipo";
        $statement = $connection->prepare($sql);
        $statement->execute([
            'numero' => $this->numero,
            'equipo' => $this->equipo,
        ]);
        $existingPlayer = $statement->fetch(PDO::FETCH_ASSOC);
    
        if ($existingPlayer && $existingPlayer['id'] != $this->id) {
            return 'Ya existe un jugador con el mismo número en este equipo';
        }
    
        if ($this->capitan) {
            $sql = "UPDATE jugadores SET capitan = 0 WHERE equipo = :equipo AND capitan = 1";
            $statement = $connection->prepare($sql);
            $statement->execute(['equipo' => $this->equipo]);
        }
    
        if ($this->id) {
            $sql = "UPDATE jugadores SET nombre = :nombre, numero = :numero, equipo = :equipo, capitan = :capitan WHERE id = :id";
            $params = [
                'nombre' => $this->nombre,
                'numero' => $this->numero,
                'equipo' => $this->equipo,
                'capitan' => $this->capitan,
                'id' => $this->id
            ];
        } else {
            $sql = "INSERT INTO jugadores (nombre, numero, equipo, capitan) VALUES (:nombre, :numero, :equipo, :capitan)";
            $params = [
                'nombre' => $this->nombre,
                'numero' => $this->numero,
                'equipo' => $this->equipo,
                'capitan' => $this->capitan
            ];
        }
    
        try {
            $statement = $connection->prepare($sql);
            $statement->execute($params);
        } catch (PDOException $e) {
            die("Error en la consulta SQL: " . $e->getMessage());
        }
    
        if (!$this->id) {
            $this->id = $connection->lastInsertId();
        }
    }

    public function delete() {
        $connection = new PDO("mysql:host=localhost;port=3306;dbname=gestion-de-equipos", "root", "");
        $sql = "DELETE FROM jugadores WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute(['id' => $this->id]);
    }
    
    public static function getAllByTeam($equipo) {
        $connection = new PDO("mysql:host=localhost;port=3306;dbname=gestion-de-equipos", "root", "");
        $sql = "SELECT * FROM jugadores WHERE equipo = :equipo";
        $statement = $connection->prepare($sql);
        $statement->execute(['equipo' => $equipo]);
    
        $jugadores = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $jugadores[] = new Jugador($row['id'], $row['nombre'], $row['numero'], $row['equipo'], $row['capitan']);
        }
    
        return $jugadores;
    }

    public static function getById($id) {
        $connection = new PDO("mysql:host=localhost;port=3306;dbname=gestion-de-equipos", "root", "");
        $sql = "SELECT * FROM jugadores WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute(['id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            $jugador = new Jugador($result['id'], $result['nombre'], $result['numero'], $result['equipo'], $result['capitan']);
            return $jugador;
        }
    
        return null;
    }

    public function update($nombre, $numero, $equipo, $capitan) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->equipo = $equipo;
        $this->capitan = $capitan;
    
        $connection = new PDO("mysql:host=localhost;port=3306;dbname=gestion-de-equipos", "root", "");
    
        if ($this->capitan) {
            $sql = "UPDATE jugadores SET capitan = 0 WHERE equipo = :equipo AND capitan = 1";
            $statement = $connection->prepare($sql);
            $statement->execute(['equipo' => $this->equipo]);
        }
    
        $sql = "SELECT * FROM jugadores WHERE equipo = :equipo AND capitan = 1";
        $statement = $connection->prepare($sql);
        $statement->execute(['equipo' => $this->equipo]);
        $existingCapitan = $statement->fetch(PDO::FETCH_OBJ);
    
        if ($existingCapitan && $this->capitan) {
            throw new Exception("Ya hay un capitán en este equipo.");
        }
    
        $sql = "UPDATE jugadores SET nombre = :nombre, numero = :numero, equipo = :equipo, capitan = :capitan WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute([
            'nombre' => $this->nombre,
            'numero' => $this->numero,
            'equipo' => $this->equipo,
            'capitan' => $this->capitan,
            'id' => $this->id
        ]);

        header('Location: ../equipos');
        exit();
    }
}
?>