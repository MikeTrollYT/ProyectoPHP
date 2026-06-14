<ul class="nav nav-tabs">
    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="view.php" class="nav-link">Productos</a></li>
    <li class="nav-item"><a href="fabricantes.php" class="nav-link">Fabricantes</a></li>
    <li class="nav-item"><a href="add_fabricante.php" class="nav-link active">Añadir Fabricante</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
</ul>
<br/>

<form action="add_fabricante.php" method="post">
    <div class="mb-3">
        <label for="nombre">Nombre del fabricante</label>
        <input type="text" class="form-control" name="nombre" required>
    </div>
    <div class="mb-3">
        <input type="submit" value="Añadir" class="form-control btn btn-primary">
    </div>
</form>

<?php if(isset($status) && $status == "error") : ?>
<div class="alert alert-danger"><?php echo $message; ?></div>
<?php endif; ?>

<?php if(isset($status) && $status == "success") : ?>
<div class="alert alert-success"><?php echo $message; ?></div>
<?php endif; ?>