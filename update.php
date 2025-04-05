<?php

require 'db_config.php';

$id = $_GET['id'];
$query = $pdo->prepare("SELECT * FROM Visitas WHERE id = ?");
$query->execute([$id]);
$visita = $query->fetch(PDO::FETCH_ASSOC);

if (!$visita){
    die("Visita no encontrada");
}

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono= $_POST['telefono'];
    $email= $_POST['email'];

    $stmt = $pdo->prepare("UPDATE Visitas SET nombre=?, apellido=?, telefono=?, email=? WHERE id=?");
    $stmt->execute([$nombre, $apellido, $telefono, $email, $id]);

    header("Location: index.php");

    exit;
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar visita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
</head>

<body class="bg-base-200 flex items-center justify-center min-h-screen">
    <div class="card bg-base-100 shadow-xl p-6 w-full max-w-lg">
        <h1 class="text-3xl font-bold text-center text-primary mb-6" >Editar Visita</h1>

        <form method="POST">
            <div class="form-control"  class="space-y-4">
                <label for="nombre" class="label">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($visita['nombre'])?>" class="input input-bordered w-full" required>
            </div>
            <div class="form-control">
                <label for="apellido" class="label">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="<?= htmlspecialchars($visita['apellido'])?>" class="input input-bordered w-full" required>
            </div>
            <div class="form-control">
                <label for="telefono" class="label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" value="<?= htmlspecialchars($visita['telefono'])?>" class="input input-bordered w-full" required>
            </div>
            <div class="form-control">
                <label for="email" class="label">Email</label>
                <input type="text" name="email" id="email" value="<?= htmlspecialchars($visita['email'])?>" class="input input-bordered w-full" required>
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-full">Guardar cambios</button>
            </div>
        </form>
    </div>

</body>
</html>