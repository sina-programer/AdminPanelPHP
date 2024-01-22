<?php

include_once('../../module.php');
include_once('../../database.php');
$connection = connect_db();
delete_db($connection, 'product_categories', ['id'=>$_GET['id']]);
redirect('index.php');

?>
