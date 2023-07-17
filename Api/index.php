<?php

include 'conexion.php';

$pdo=new Conexion();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['Id'];
    $nombreProducto = $_POST['Nombre'];

    $sqlRegistro = "INSERT INTO registro_productos (Id, Nombre, Marca, Presentación, Precio) VALUES (:Id, :Nom, :Mar, :Pre, :Precio)";
    $stmtRegistro = $pdo->prepare($sqlRegistro);
    $stmtRegistro->bindValue(':Id', $id);
    $stmtRegistro->bindValue(':Nom', $nombreProducto);
    $stmtRegistro->bindValue(':Mar', $_POST['Marca']);
    $stmtRegistro->bindValue(':Pre', $_POST['Presentación']);
    $stmtRegistro->bindValue(':Precio', $_POST['Precio']);
    $stmtRegistro->execute();

    // Obtener el último ID insertado en la tabla "registro_productos"
    $lastInsertId = $pdo->lastInsertId();

    // Insertar en la tabla "productos_inventario"
    $sqlInventario = "INSERT INTO productos_inventario (Id, Cantidad) VALUES (:Id, 0)";
    $stmtInventario = $pdo->prepare($sqlInventario);
    $stmtInventario->bindValue(':Id', $lastInsertId);
    $stmtInventario->execute();

    header("HTTP/1.1 200 OK");
    echo json_encode("Registrado con exito");
    exit;
}

/*header ("HTTP/1.1 400 Bad REQUEST_METHOD")*/
?>
