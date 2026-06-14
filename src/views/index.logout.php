<ul class="nav nav-tabs">
    <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
    <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
</ul>
<br/>

<!-- Buscador y ordenacion -->
<form action="index.php" method="get" class="row g-2 mb-4">
    <div class="col-auto">
        <input type="text" class="form-control" name="buscar" 
               placeholder="Buscar por nombre o descripción..."
               value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    <div class="col-auto">
        <?php 
            $orden_actual = isset($_GET['orden']) ? $_GET['orden'] : 'asc';
            $orden_nuevo = $orden_actual == 'asc' ? 'desc' : 'asc';
            $icono = $orden_actual == 'asc' ? '↑' : '↓';
            $buscar_param = isset($_GET['buscar']) ? '&buscar='.urlencode($_GET['buscar']) : '';
        ?>
        <a href="index.php?orden=<?php echo $orden_nuevo . $buscar_param; ?>" class="btn btn-secondary">
            Precio <?php echo $icono; ?>
        </a>
    </div>
</form>

<!-- Catalogo de productos -->
<div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
    <?php foreach ($productos as $producto) : ?>
    <div class="col">
        <div class="card h-100">
            <img src="assets/upload/<?php echo $producto['imagen'] ?>" 
                 class="card-img-top" style="height:180px; object-fit:cover;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $producto['nombre'] ?></h5>
                <p class="card-text text-muted"><?php echo $producto['descripcion'] ?></p>
                <p class="card-text"><strong><?php echo $producto['precio'] ?> €</strong></p>
            </div>
            <div class="card-footer">
                <a href="ficha.php?id=<?php echo $producto['id'] ?>" class="btn btn-sm btn-outline-primary">
                    Ver ficha
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Paginación -->
<nav>
    <ul class="pagination">
        <?php for($i = 1; $i <= $total_paginas; $i++) : 
            $buscar_param = isset($_GET['buscar']) ? '&buscar='.urlencode($_GET['buscar']) : '';
            $orden_param = isset($_GET['orden']) ? '&orden='.$_GET['orden'] : '';
        ?>
        <li class="page-item <?php echo $i == $pagina_actual ? 'active' : ''; ?>">
            <a class="page-link" href="index.php?pagina=<?php echo $i . $buscar_param . $orden_param; ?>">
                <?php echo $i; ?>
            </a>
        </li>
        <?php endfor; ?>
    </ul>
</nav>