<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['mensaje'])) {
    $mensaje = strip_tags($_POST['mensaje']);
    $fecha = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO mensajes (texto, fecha) VALUES (:texto, :fecha)");
    $stmt->execute([':texto' => $mensaje, ':fecha' => $fecha]);
}

header('Location: index.php');
exit;
?>
