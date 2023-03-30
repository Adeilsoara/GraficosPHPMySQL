<?php
require_once 'connect.php';
$stmt = $conn->prepare('select * from product'); //consulta responsável por preencher os gráficos
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($results);
?>