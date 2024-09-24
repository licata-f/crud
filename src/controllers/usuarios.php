<?php
include("../includes/db.php");
$opcode = $_GET["opcode"];

if ($opcode == 0) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $stmt = $conx->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);
} else if ($opcode == 1) {
    $id = $_POST["id"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $stmt = $conx->prepare("UPDATE usuarios SET email = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ssi", $email, $password, $id);
} else if ($opcode == 2) {
    $id = $_GET["id"];
    $stmt = $conx->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
} else die();
$stmt->execute();

header("Location: ../views/usuarios/listado.php");
?>