<?php
require_once 'config.php';
$mensajes = $conn->query("SELECT * FROM mensajes ORDER BY fecha DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Voces Anónimas</title>
    <link rel="stylesheet" href="css/estilo.css">

    </head>
    <body>
        <?php include 'includes/header.php'; ?>

        <h1>Voces Anónimas</h1>

        <form action="guardar.php" method="POST">
            <textarea name="mensaje" placeholder="Escribe tu mensaje anónimo aquí..." required></textarea><br>
            <button type="submit">Enviar</button>
        </form>

        <?php foreach ($mensajes as $m): ?>
            <div class="message">
                <p><?= htmlspecialchars($m['texto']) ?></p>
                <div class="date"><?= date('d/m/Y H:i', strtotime($m['fecha'])) ?></div>
            </div>
        <?php endforeach; ?>

        <?php include 'includes/footer.php'; ?>

    </body>
</html>
