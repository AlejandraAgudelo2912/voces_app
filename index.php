<?php
require_once 'config.php';

$stmt = $conn->query("SELECT * FROM mensajes ORDER BY fecha DESC");
$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Voces Anónimas</title>

</head>
<body>

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

</body>
</html>
