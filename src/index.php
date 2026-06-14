<?php 
session_start();

include_once('config/config.php');
include_once('views/header.php');

if(isset($_SESSION['logged'])) {
    include_once('views/index.logged.php');
} else {
    // Parametros de busqueda, orden y paginacion
    $buscar = isset($_GET['buscar']) ? $mysqli->real_escape_string($_GET['buscar']) : '';
    $orden = (isset($_GET['orden']) && $_GET['orden'] == 'desc') ? 'DESC' : 'ASC';
    $por_pagina = 3;
    $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $offset = ($pagina_actual - 1) * $por_pagina;

    // WHERE para la busqueda
    $where = '';
    if(!empty($buscar)) {
        $where = "WHERE p.nombre LIKE '%$buscar%' OR p.descripcion LIKE '%$buscar%'";
    }

    // Total de productos para la paginacion
    $total_result = $mysqli->query("SELECT COUNT(*) as total FROM producto p $where");
    $total_row = $total_result->fetch_assoc();
    $total_paginas = ceil($total_row['total'] / $por_pagina);

    // Consulta productos
    $result = $mysqli->query("SELECT p.*, f.nombre AS nombre_fabricante FROM producto p JOIN fabricante f ON p.id_fabricante = f.id $where ORDER BY p.precio $orden LIMIT $por_pagina OFFSET $offset");

    $productos = array();
    while($row = $result->fetch_array()) {
        $productos[] = $row;
    }

    $mysqli->close();

    include_once('views/index.logout.php');
}

include_once('views/footer.php');
?>