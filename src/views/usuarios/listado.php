<?php
include("../../includes/db.php");
$resultado = $conx->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista</title>
    </head>
    <body>
        <a href="./formulario.php">Agregar</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_object()) { ?>
                <tr>
                    <td><?php echo $fila->id ?></td>
                    <td><?php echo $fila->email ?></td>
                    <td><?php echo $fila->password ?></td>
                    <td><a href="./formulario.php?id=<?php echo $fila->id ?>">Editar</a></td>
                    <td><a href="../../controllers/usuarios.php?id=<?php echo $fila->id ?>&opcode=<?php echo 2?>">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>

