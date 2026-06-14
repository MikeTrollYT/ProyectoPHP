<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

include_once("config/config.php");
include_once("views/header.php");

if(!empty($_POST)) {
    $id = $mysqli->real_escape_string($_POST['id']);
    $nombre = $mysqli->real_escape_string($_POST['nombre']);

    if(empty($nombre)) {
        $status = "error";
        $message = "El campo nombre está vacío.";
    } else {
        $mysqli->query("UPDATE fabricante SET nombre='$nombre' WHERE id=$id");
        header("Location: fabricantes.php");
    }
}

$id = $mysqli->real_escape_string($_GET['id']);
$result = $mysqli->query("SELECT * FROM fabricante WHERE id=$id");
$fabricante = $result->fetch_assoc();

$mysqli->close();

$status = "success";
$message = "Fabricante editado correctamente.";

include_once("views/edit_fabricante.php");
include_once("views/footer.php");
?>