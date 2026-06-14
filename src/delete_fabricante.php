<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

include_once("config/config.php");

$id = $mysqli->real_escape_string($_GET['id']);
$mysqli->query("DELETE FROM fabricante WHERE id=$id");
$mysqli->close();

header("Location: fabricantes.php");
?>