<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

include_once("config/config.php");
include_once("views/header.php");

if(!empty($_POST)) {
    $nombre = $mysqli->real_escape_string($_POST['nombre']);

    if(empty($nombre)) {
        $status = "error";
        $message = "El campo nombre está vacío.";
    } else {
        $mysqli->query("INSERT INTO fabricante (nombre) VALUES ('$nombre')");

        if($mysqli->errno == 0) {
            $status = "success";
            $message = "Fabricante añadido correctamente.";
        } else {
            $status = "error";
            $message = "Error: " . $mysqli->error;
        }

        $mysqli->close();
    }
}

include_once("views/add_fabricante.php");
include_once("views/footer.php");
?>