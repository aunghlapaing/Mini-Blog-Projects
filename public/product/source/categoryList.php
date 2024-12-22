<?php 
$query = "select * from category";
$res = $pdo->prepare($query);
$res->execute();

$data = $res->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($data);



?>