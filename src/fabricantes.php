<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

include_once("config/config.php");
include_once("views/header.php");

$result = $mysqli->query("SELECT * FROM fabricante ORDER BY nombre ASC");

$fabricantes = array();
while($row = $result->fetch_array()) {
    $fabricantes[] = $row;
}

$mysqli->close();

include_once("views/fabricantes.php");
include_once("views/footer.php");
?>