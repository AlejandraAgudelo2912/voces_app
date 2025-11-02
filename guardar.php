<?php
$dir = '/tmp/datos';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$archivo = $dir . '/mensajes.json';

if (!file_exists($archivo)) {
    file_put_contents($archivo, '[]');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['mensaje'])) {
    $mensaje = strip_tags($_POST['mensaje']);

    $nuevo = [
        'texto' => $mensaje,
        'fecha' => date('d/m/Y H:i')
    ];

    $mensajes = json_decode(file_get_contents($archivo), true);
    $mensajes[] = $nuevo;

    file_put_contents($archivo, json_encode($mensajes, JSON_PRETTY_PRINT));

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>