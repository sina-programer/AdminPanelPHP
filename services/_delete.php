<?php

include_once('../module.php');
include_once('../database.php');
$connection = connect_db();
delete_db($connection, 'services', ['id'=>$_GET['id']]);
redirect("index.php");

?>
