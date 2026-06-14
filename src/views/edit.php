<ul class="nav nav-tabs">
    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="view.php" class="nav-link">Productos</a></li>
    <li class="nav-item"><a href="add.php" class="nav-link">Añadir Producto</a></li>
    <li class="nav-item"><a href="fabricantes.php" class="nav-link">Fabricantes</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
</ul>
<br/>

<form action="edit.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" 
               value="<?php echo $producto['nombre']; ?>">
    </div>
    <div class="mb-3">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" rows="3" name="descripcion">
            <?php echo $producto['descripcion']; ?>
        </textarea>
    </div>
    <div class="mb-3">
        <label for="precio">Precio (€)</label>
        <input type="number" step="0.01" class="form-control" name="precio" 
               value="<?php echo $producto['precio']; ?>">
    </div>
    <div class="mb-3">
        <label for="id_fabricante">Fabricante</label>
        <select class="form-select" name="id_fabricante" required>
            <option value="">-- Selecciona un fabricante --</option>
            <?php foreach($fabricantes as $fab) : ?>
            <option value="<?php echo $fab['id']; ?>"
                <?php echo $fab['id'] == $producto['id_fabricante'] ? 'selected' : ''; ?>>
                <?php echo $fab['nombre']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Imagen del producto</label>
        <img src="assets/upload/<?php echo $producto['imagen']; ?>" 
             width="80" height="80" class="d-block mb-2">
        <input type="file" accept=".png, .jpg, .jpeg" class="form-control" name="imagen">
        <small class="text-muted">Deja vacío para mantener la imagen actual.</small>
    </div>

    <input type="hidden" name="imagen" value="<?php echo $producto['imagen']; ?>">
    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

    <div class="mb-3">
        <input type="submit" value="Actualizar" class="form-control btn btn-primary">
    </div>
</form>

<?php if (isset($status) && $status == "error") : ?>
<div class="alert alert-danger"><?php echo $message; ?></div>
<?php endif; ?>

<?php if (isset($status) && $status == "success") : ?>
<div class="alert alert-success"><?php echo $message; ?></div>
<?php endif; ?>