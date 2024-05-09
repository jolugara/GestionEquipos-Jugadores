<?php
    require_once '../../models/Jugador.php';
    require_once '../../models/Equipo.php';

    if (!isset($_GET['id'])) {
        header('Location: ../../views/equipos');
        exit();
    }

    $id = $_GET['id'];
    $jugador = Jugador::getById($id);
    $equipos = Equipo::getAll();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $capitan = isset($_POST['capitan']) ? 1 : 0;
        $result = $jugador->update($_POST['nombre'], $_POST['numero'], $_POST['equipo'], $capitan);
    
        if ($result === true) {
            header('Location: /views/equipos');
            exit();
        } else {
            $error = $result;
        }
    }
?>

<style>
body {
    font-family: Arial, sans-serif;
}
form {
    width: 60%;
    margin: 20px auto;
}
label, input, select {
    display: block;
    margin-bottom: 10px;
}
a {
    display: inline-block;
    padding: 5px 10px;
    border: 2px solid #4CAF50;
    color: #4CAF50;
    text-decoration: none;
    margin-bottom: 20px;
}
</style>

<?php if (isset($error)): ?>
    <p>Error: <?php echo $error; ?></p>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Jugador</title>
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
</head>
<body>
    <a href="../../views/equipos">Volver a la lista de equipos</a>
    <form action="" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $jugador->getNombre(); ?>" required><br>
        <label>Número:</label>
        <input type="number" name="numero" value="<?php echo $jugador->getNumero(); ?>" required><br>
        <label>Equipo:</label>
        <select name="equipo" required>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?php echo $equipo->getId(); ?>" <?php echo $jugador->getEquipo() == $equipo->getId() ? 'selected' : ''; ?>>
                    <?php echo $equipo->getNombre(); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <label>Capitán:</label>
        <input type="checkbox" id="capitan" name="capitan" value="1" <?php echo $jugador->getCapitan() ? 'checked' : '' ?>><br>
        <input type="submit" value="Guardar cambios">
    </form>
</body>
</html>