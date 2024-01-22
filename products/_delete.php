<?php

include_once('../module.php');
include_once('../database.php');
$connection = connect_db();
delete_db($connection, 'products', ['id'=>$_GET['id']]);
delete_db($connection, 'product_images', ['product_id'=>$_GET['id']]);
redirect('index.php');

?>
