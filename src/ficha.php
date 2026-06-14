<?php
session_start();

include_once("config/config.php");
include_once("views/header.php");

$id = $mysqli->real_escape_string($_GET['id']);

$result = $mysqli->query("SELECT p.*, f.nombre AS nombre_fabricante FROM producto p JOIN fabricante f ON p.id_fabricante = f.id WHERE p.id = $id");

$producto = $result->fetch_assoc();
$mysqli->close();

include_once("views/ficha.php");
include_once("views/footer.php");
?>