<?php
$archivo = '/tmp/datos/mensajes.json';

// Crear si no existe
if (!file_exists($archivo)) {
    @mkdir(dirname($archivo), 0777, true);
    file_put_contents($archivo, '[]');
}

// Leer mensajes
$mensajes = json_decode(file_get_contents($archivo), true);
if (!is_array($mensajes)) {
    $mensajes = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voces Anónimas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
        <?php include 'includes/header.php'; ?>


    <main>
        <h1>Comparte tu historia</h1>
        <p>Este espacio es seguro y anónimo. Escribe lo que sientas. No estás sola, no estás solo.</p>

        <form action="guardar.php" method="POST">
            <textarea name="mensaje" placeholder="Escribe aquí tu historia o mensaje..."></textarea>
            <button type="submit">Enviar</button>
        </form>

        <h2>Últimos mensajes</h2>
        <?php if (count($mensajes) === 0): ?>
            <p>Aún no hay mensajes. Sé la primera persona en escribir.</p>
        <?php else: ?>
            <?php foreach (array_reverse($mensajes) as $m): ?>
                <div class="mensaje">
                    <p><?= htmlspecialchars($m['texto']) ?></p>
                    <span><?= htmlspecialchars($m['fecha']) ?></span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>

 <?php include 'includes/footer.php'; ?>
</body>
</html>
