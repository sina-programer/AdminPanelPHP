<?php

include_once('../../module.php');
include_once('../../database.php');
$connection = connect_db();

$image = $_POST['old-image'];
if ($_FILES['image']['name'] != ''){
    $mobile_image = time().'-'.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], '../../images/'.$image);
}

update_db(
    $connection,
    'product_categories',
    [
        'title'=>$_POST['title'],
        'status'=>$_POST['status'],
        'description'=>$_POST['description'],
        'image'=>$image
    ],
    [
        'id'=>$_POST['id']
    ]
);

redirect("index.php");

?>
