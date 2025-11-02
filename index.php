<?php include 'includes/header.php'; ?>

<h1>Voces que ya no callan</h1>
<p>Este es un espacio anónimo para liberar lo que llevas dentro. No estás sola. No estás solo.</p>

<form action="guardar.php" method="POST">
    <textarea name="mensaje" placeholder="Escribe aquí tu historia o tus sentimientos..." required></textarea><br>
    <button type="submit">Publicar anónimamente</button>
</form>

<hr>

<h2>Últimos testimonios</h2>

<?php
$archivo = 'datos/mensajes.json';
if (file_exists($archivo)) {
    $mensajes = json_decode(file_get_contents($archivo), true);
    if (!empty($mensajes)) {
        foreach (array_reverse($mensajes) as $mensaje) {
            echo "<div class='mensaje'>";
            echo "<p>" . htmlspecialchars($mensaje['texto']) . "</p>";
            echo "<span>" . $mensaje['fecha'] . "</span>";
            echo "</div>";
        }
    } else {
        echo "<p>Aún no hay testimonios. Sé la primera voz en hablar</p>";
    }
}
?>

<?php include 'includes/footer.php'; ?>
