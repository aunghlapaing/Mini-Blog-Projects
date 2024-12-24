<?php 
require_once("../../db/dbconnection.php");

//delete image file form local

// $delete_file_query = "select image from product where id=?";
// $res = $pdo->prepare($delete_file_query);
// $res-> execute([$id]);

// $data = $res->fetch(PDO::FETCH_ASSOC);
// // print_r($data);

// $image_name = $data['image'];
// // print_r($image_name);

$id = $_GET['id'];
$old_image = $_GET['oldImage'];

unlink("../../image/$old_image");

//delete from database

$delete_query = "delete from product where id=?";
$delete_res = $pdo->prepare($delete_query);
$delete_res->execute([$id]);

header ("Location:listProduct.php");
?>