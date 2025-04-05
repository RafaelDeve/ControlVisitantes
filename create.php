<?php

require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono= $_POST['telefono'];
    $email= $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO Visitas (nombre, apellido, telefono, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $apellido, $telefono, $email]);

    header("Location: index.php");

    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar visitas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
</head>

<body class="bg-base-200 flex items-center justify-center min-h-screen">
    <div class="card bg-base-100 shadow-xl p-6 w-full max-w-lg">
        <h1 class="text-3xl font-bold text-center text-primary mb-6">Agregar Visita</h1>

        <form method="POST" class="space-y-4">
            <div class="form-control">
                <label for="nombre" class="label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="input input-bordered w-full" required>
            </div>
            <div class="form-control">
                <label for="apellido" class="label">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="input input-bordered w-full" required>
            </div>
            <div class="form-control">
                <label for="telefono" class="label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="input input-bordered w-full" required>
            </div>
            <div class="form-control">
                <label for="email" class="label">Email</label>
                <input type="text" name="email" id="email" class="input input-bordered w-full" required>
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-full">Guardar</button>
            </div>
        </form>
    </div>

</body>
</html>