<?php

require 'db_config.php';

$query = $pdo->query("SELECT * FROM Visitas");
$visitas = $query->fetchAll(PDO::FETCH_ASSOC);

?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de visitas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
</head>

<body class="bg-base-200 text-base-content font-sans">
    <div class="container mx-auto p-6">
    <h1 class="text-3xl text-center text-primary font-bold mb-6">Registro de visitas</h1>

    <div class="flex justify-end mb-4">
        <a href="create.php" class="btn btn-primary btn-wide">➕ Agregar visita</a>
    </div>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="py-3 px-4">Nombre</th>
                        <th class="py-3 px-4">Apellido</th>
                        <th class="py-3 px-4">Teléfono</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($visitas as $visita): ?>
                        <tr class="hover">
                            <td class="py-2 px-4"> <?= htmlspecialchars($visita['nombre'])?> </td>
                            <td class="py-2 px-4"> <?= htmlspecialchars($visita['apellido'])?> </td>
                            <td class="py-2 px-4"> <?= htmlspecialchars($visita['telefono'])?> </td>
                            <td class="py-2 px-4"> <?= htmlspecialchars($visita['email'])?> </td>
                            <td>
                                <a href="update.php?id=<?= $visita['id']?>" class="btn btn-info btn-sm" >Editar</a>
                                <a href="delete.php?id=<?= $visita['id']?>" onclick="return confirm('¿Seguro que quieres eliminar esta visita?')" class="btn btn-error btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php if(empty($visitas)): ?>
            <div class="alert alert-warning mt-4">
                <span>⚠️ No hay visitas registradas</span>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>


<!-- RAFAEL ALBERTO PEREZ AYBAR -->