<ul class="nav nav-tabs">
    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
    <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
</ul>
<br/>

<?php if($producto) : ?>
<div class="card">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="assets/upload/<?php echo $producto['imagen']; ?>" 
                 class="img-fluid rounded-start" style="max-height:300px; object-fit:cover;">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h3 class="card-title"><?php echo $producto['nombre']; ?></h3>
                <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                <p class="card-text">
                    <strong>Fabricante:</strong> <?php echo $producto['nombre_fabricante']; ?>
                </p>
                <p class="card-text">
                    <strong>Precio:</strong> <?php echo $producto['precio']; ?> €
                </p>
                <a href="index.php" class="btn btn-secondary">← Volver al catálogo</a>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
<div class="alert alert-danger">Producto no encontrado.</div>
<?php endif; ?>