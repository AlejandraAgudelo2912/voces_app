<?php

$dir = __DIR__ . '/datos';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}
chmod($dir, 0777);

$archivo = $dir . '/mensajes.json';
if (!file_exists($archivo)) {
    file_put_contents($archivo, '[]');
    chmod($archivo, 0666);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['mensaje'])) {
    $archivo = 'datos/mensajes.json';
    $mensaje = strip_tags($_POST['mensaje']);

    $nuevo = [
        'texto' => $mensaje,
        'fecha' => date('d/m/Y H:i')
    ];

    if (file_exists($archivo)) {
        $mensajes = json_decode(file_get_contents($archivo), true);
    } else {
        $mensajes = [];
    }

    $mensajes[] = $nuevo;
    file_put_contents($archivo, json_encode($mensajes, JSON_PRETTY_PRINT));

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
