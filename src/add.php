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
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $precio = $mysqli->real_escape_string($_POST['precio']);
    $descripcion = $mysqli->real_escape_string($_POST['descripcion']);
    $id_fabricante = $mysqli->real_escape_string($_POST['id_fabricante']);

    if(isset($_FILES['imagen']['name']) && !empty($_FILES['imagen']['name'])){
        $path_upload = "/var/www/html/assets/upload/";
        $extension = explode(".", $_FILES['imagen']['name']);
        $imagen = uniqid() . "." . $extension[1];
        $image_path = $path_upload . $imagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $image_path);
    } else {
        $imagen = "default.png";
    }

    if(empty($nombre) || empty($precio) || empty($id_fabricante)) {
        $status = "error";
        $message = "";
        if(empty($nombre)) $message .= "El campo nombre está vacío.<br/>";
        if(empty($precio)) $message .= "El campo precio está vacío.<br/>";
        if(empty($id_fabricante)) $message .= "Debes seleccionar un fabricante.<br/>";
    } else {
        $result = $mysqli->query("INSERT INTO producto(nombre, descripcion, precio, imagen, id_fabricante) VALUES('$nombre', '$descripcion', '$precio', '$imagen', '$id_fabricante')");
        $mysqli->close();
        $status = "success";
        $message = "Producto añadido correctamente.";
    }
} 

include_once("views/add.php");
include_once("views/footer.php");
?>