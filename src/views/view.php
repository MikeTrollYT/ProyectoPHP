<ul class="nav nav-tabs">
    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="view.php" class="nav-link active">Productos</a></li>
    <li class="nav-item"><a href="add.php" class="nav-link">Añadir Producto</a></li>
    <li class="nav-item"><a href="fabricantes.php" class="nav-link">Fabricantes</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
</ul>
<br/>

<table class="table table-striped table-bordered table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fabricante</th>
            <th>Precio (€)</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto) : ?>
        <tr>
            <td><img src="assets/upload/<?php echo $producto['imagen'] ?>" 
                     width="50px" height="50px"></td>
            <td><?php echo $producto['nombre'] ?></td>
            <td><?php echo $producto['descripcion'] ?></td>
            <td><?php echo $producto['nombre_fabricante'] ?></td>
            <td><?php echo $producto['precio'] ?> €</td>
            <td>
                <a href="edit.php?id=<?php echo $producto['id'] ?>" 
                   class="btn btn-sm btn-primary">Editar</a>
                <a href="delete.php?id=<?php echo $producto['id'] ?>" 
                   onClick="return confirm('¿Seguro que quieres eliminar este producto?')" 
                   class="btn btn-sm btn-danger">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>