<ul class="nav nav-tabs">
    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="view.php" class="nav-link">Productos</a></li>
    <li class="nav-item"><a href="fabricantes.php" class="nav-link active">Fabricantes</a></li>
    <li class="nav-item"><a href="add_fabricante.php" class="nav-link">Añadir Fabricante</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
</ul>
<br/>

<table class="table table-striped table-bordered table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($fabricantes as $fabricante) : ?>
        <tr>
            <td><?php echo $fabricante['id']; ?></td>
            <td><?php echo $fabricante['nombre']; ?></td>
            <td>
                <a href="edit_fabricante.php?id=<?php echo $fabricante['id']; ?>" 
                   class="btn btn-sm btn-primary">Editar</a>
                <a href="delete_fabricante.php?id=<?php echo $fabricante['id']; ?>" 
                   onClick="return confirm('¿Seguro que quieres eliminar este fabricante?')" 
                   class="btn btn-sm btn-danger">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>