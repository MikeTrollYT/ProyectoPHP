<?php 
session_start();

if(!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

include_once("config/config.php");
include_once("views/header.php");

// Obtener los fabricantes para el desplegable
$fabricantes = array();
$res_fab = $mysqli->query("SELECT id, nombre FROM fabricante ORDER BY nombre ASC");
while($row = $res_fab->fetch_array()) {
    $fabricantes[] = $row;
}

if(!empty($_POST)) {
    $id = $mysqli->real_escape_string($_POST['id']);
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $precio = $mysqli->real_escape_string($_POST['precio']);
    $descripcion = $mysqli->real_escape_string($_POST['descripcion']);
    $imagen = $mysqli->real_escape_string($_POST['imagen']);
    $id_fabricante = $mysqli->real_escape_string($_POST['id_fabricante']);

    if(isset($_FILES['imagen']['name']) && !empty($_FILES['imagen']['name'])){
        $path_upload = "/var/www/html/assets/upload/";
        $extension = explode(".", $_FILES['imagen']['name']);
        $imagen = uniqid() . "." . $extension[1];
        $image_path = $path_upload . $imagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $image_path);
    }

    if(empty($nombre) || empty($precio) || empty($id_fabricante)) {
        $status = "error";
        $message = "";
        if(empty($nombre)) $message .= "El campo nombre está vacío.<br/>";
        if(empty($precio)) $message .= "El campo precio está vacío.<br/>";
        if(empty($id_fabricante)) $message .= "Debes seleccionar un fabricante.<br/>";
    } else {
        $mysqli->query("UPDATE producto SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen', id_fabricante='$id_fabricante' WHERE id=$id");
        header("Location: view.php");
    }
}

$id = $mysqli->real_escape_string($_GET['id']);
$result = $mysqli->query("SELECT * FROM producto WHERE id=$id");

$producto = array();
while($row = $result->fetch_array()) {
    $producto['id'] = $row['id'];
    $producto['nombre'] = $row['nombre'];
    $producto['descripcion'] = $row['descripcion'];
    $producto['precio'] = $row['precio'];
    $producto['imagen'] = $row['imagen'];
    $producto['id_fabricante'] = $row['id_fabricante'];
}

$mysqli->close();
$status = "success";
$message = "Producto editado correctamente.";

include_once("views/edit.php");
include_once("views/footer.php");
?>