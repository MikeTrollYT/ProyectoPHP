<ul class="nav nav-tabs">
    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
    <li class="nav-item"><a href="register.php" class="nav-link active">Register</a></li>
</ul>
<br/>

<form action="register.php" method="post">
    <div class="mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="apellido1">Primer Apellido</label>
        <input type="text" class="form-control" name="apellido1" required>
    </div>
    <div class="mb-3">
        <label for="apellido2">Segundo Apellido</label>
        <input type="text" class="form-control" name="apellido2">
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="login">Login</label>
        <input type="text" class="form-control" name="login" required>
    </div>
    <div class="mb-3">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="mb-3">
        <input type="submit" value="Registrarse" class="form-control btn btn-primary">
    </div>
</form>

<?php if (isset($status) && $status == "error") : ?>
<div class="alert alert-danger"><?php echo $message; ?></div>
<?php endif; ?>

<?php if (isset($status) && $status == "success") : ?>
<div class="alert alert-success"><?php echo $message; ?></div>
<?php endif; ?>