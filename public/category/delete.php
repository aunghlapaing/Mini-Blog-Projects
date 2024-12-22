<?php 
require_once("../../db/dbconnection.php");

// print_r ($_GET['id']);

$delete_query = "delete from category where id=?";
$res = $pdo->prepare ($delete_query);
$res->execute([$_GET['id']]);

header("Location:create.php");

?>