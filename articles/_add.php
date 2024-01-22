<?php

include_once('../module.php');
include_once('../database.php');
$connection = connect_db();

$image_name = time().'-'.$_FILES['image']['name'];
$temp_path = $_FILES['image']['tmp_name'];
$destination = '../images/'.$image_name;
move_uploaded_file($temp_path, $destination);

insert_db(
    $connection,
    'articles',
    [
        'title'=>$_POST['title'],
        'description'=>$_POST['description'],
        'image'=>$image_name,
        'status'=>$_POST['status'],
        'author_name'=>$_POST['author_name'],
        'seo_title'=>$_POST['seo_title'],
        'seo_description'=>$_POST['seo_description']
    ]
);

redirect("index.php");

?>
