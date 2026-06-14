<?php
include("config/config.php");
include_once("views/header.php");

if(!empty($_POST)) {
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $apellido1 = $mysqli->real_escape_string($_POST['apellido1']);
    $apellido2 = $mysqli->real_escape_string($_POST['apellido2']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $login = $mysqli->real_escape_string($_POST['login']);
    $password = $mysqli->real_escape_string($_POST['password']);

    if(empty($nombre) || empty($apellido1) || empty($email) || empty($login) || empty($password)) {
        $status = "error";
        $message = "Todos los campos obligatorios deben estar rellenos.";
    } else {
        $mysqli->query("INSERT INTO usuario (nombre, apellido1, apellido2, email, login, password) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', md5('$password'))");

        if ($mysqli->errno == 0) {
            $status = "success";
            $message = "Registro realizado con éxito.";
        } else {
            $status = "error";
            $message = "Error: $mysqli->error";
        }
        $mysqli->close();
    }
}

include_once("views/register.php");
include_once("views/footer.php");
?>