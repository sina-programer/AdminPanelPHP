<?php

include_once('../../module.php');
include_once('../../database.php');
$connection = connect_db();

$id = $_POST['product_id'];
$image = time().'-'.$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], '../../images/'.$image);

insert_db(
    $connection,
    'product_images',
    [
        'product_id'=>$id,
        'image'=>$image
    ]
);

redirect("index.php?id=$id");

?>
