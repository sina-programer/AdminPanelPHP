<?php

include_once('../../module.php');
include_once('../../database.php');
$connection = connect_db();
$product_id = $_GET['product_id'];
update_db($connection, 'product_images', ['cover'=>0], ['product_id'=>$product_id]);
update_db($connection, 'product_images', ['cover'=>1], ['id'=>$_GET['id']]);
redirect("index.php?id=$product_id");

?>
