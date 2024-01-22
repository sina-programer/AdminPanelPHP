<?php

include_once('../../module.php');
include_once('../../database.php');
$connection = connect_db();
$product_id = $_GET['product_id'];
delete_db($connection, 'product_images', ['id'=>$_GET['id']]);
redirect("index.php?id=$product_id");

?>
