<?php
$host = 'dpg-d43p9q1r0fns73fcg0k0-a';
$usuario = 'mensajes_db_iu26_user';
$contrasena = 'omZUyejFHI7RUXOxpYyfrqUR8nKAknbh';
$base_datos = 'mensajes_db_iu26';

try {
    $conn = new PDO("mysql:host=$host;dbname=$base_datos;charset=utf8", $usuario, $contrasena);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
