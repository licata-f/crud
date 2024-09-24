<?php
include("../../includes/db.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $conx->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_object();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h1><?php echo (isset($_GET["id"]) ? "Editar" : "Nuevo") ?> usuario</h1>

    <form action="../../controllers/usuarios.php?opcode=<?php echo (isset($_GET["id"]) ? 1 : 0) ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo (isset($_GET["id"]) ? $usuario->id : "") ?>">
        <label>Email</label><br>
        <input type="text" name="email" value="<?php echo (isset($_GET["id"]) ? $usuario->email : "") ?>"><br><br>
        <label>Password</label><br>
        <input type="text" name="password" value="<?php echo (isset($_GET["id"]) ? $usuario->password : "") ?>"><br><br>
        <button>Guardar</button>
    </form>
</body>
</html>