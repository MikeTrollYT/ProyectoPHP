<?php 
session_start();
include_once("views/header.php");
include_once("config/config.php");

if(!empty($_POST)) {
    $login = mysqli_real_escape_string($mysqli, $_POST['login']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);

    if(empty($login) || empty($password)) {
        $status = "error";
        $message = "El campo login o contraseña está vacío.";
    } else {
        $result = $mysqli->query("SELECT * FROM usuario WHERE login='$login' AND password=md5('$password')");
        $row = $result->fetch_assoc();
        $mysqli->close();
        
        if(is_array($row) && !empty($row)) {
            $_SESSION['logged'] = true;
            $_SESSION['login'] = $row['login'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['id_usuario'] = $row['id'];
            header('Location: index.php');
        } else {
            $status = "error";
            $message = "Login o contraseña incorrectos.";
        }
    }
}

include_once("views/login.php");
include_once("views/footer.php");
?>