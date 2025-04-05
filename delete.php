<?php
require 'db_config.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM Visitas WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>