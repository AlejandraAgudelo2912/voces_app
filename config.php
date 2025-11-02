<?php
$archivo_db = __DIR__ . '/datos/mensajes.db';

if (!is_dir(__DIR__ . '/datos')) {
    mkdir(__DIR__ . '/datos', 0777, true);
}

try {
    $conn = new PDO('sqlite:' . $archivo_db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("
        CREATE TABLE IF NOT EXISTS mensajes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            texto TEXT NOT NULL,
            fecha TEXT NOT NULL
        )
    ");
} catch (PDOException $e) {
    die('Error de conexión a SQLite: ' . $e->getMessage());
}
?>
