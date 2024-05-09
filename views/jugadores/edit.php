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

<?php if (isset($error)): ?>
    <p>Error: <?php echo $error; ?></p>
<?php endif; ?>

<a href="../../views/equipos">Volver a la lista de equipos</a>

<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $jugador->getNombre(); ?>">

    <label for="numero">Número:</label>
    <input type="number" id="numero" name="numero" value="<?php echo $jugador->getNumero(); ?>">

    <label for="equipo">Equipo:</label>
    <select id="equipo" name="equipo">
        <?php foreach ($equipos as $equipo): ?>
            <option value="<?php echo $equipo->getId(); ?>" <?php echo $jugador->getEquipo() == $equipo->getId() ? 'selected' : ''; ?>>
                <?php echo $equipo->getNombre(); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <label for="capitan">Capitán:</label>
    <input type="checkbox" id="capitan" name="capitan" value="1" <?php echo $jugador->getCapitan() ? 'checked' : '' ?>>

    <input type="submit" value="Guardar cambios">
</form>