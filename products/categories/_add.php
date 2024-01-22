<?php

include_once('../../module.php');
include_once('../../database.php');
$connection = connect_db();

$image = time().'-'.$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], '../../images/'.$image);

insert_db(
    $connection,
    'product_categories',
    [
        'title'=>$_POST['title'],
        'image'=>$image,
        'status'=>$_POST['status'],
        'description'=>$_POST['description']
    ]
);

redirect("index.php");

?>
