<?php 
session_start();

if(!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

include_once("config/config.php");
include_once("views/header.php");

$result = $mysqli->query("SELECT p.*, f.nombre AS nombre_fabricante FROM producto p JOIN fabricante f ON p.id_fabricante = f.id ORDER BY p.id DESC");

$productos = array();
while($row = $result->fetch_array()) {
    $productos[] = $row;
}

$mysqli->close();

include_once('views/view.php');
include_once("views/footer.php");
?>