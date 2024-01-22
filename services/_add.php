<?php

include_once('../module.php');
include_once('../database.php');
$connection = connect_db();

$icon = time().'-'.$_FILES['icon']['name'];
move_uploaded_file($_FILES['icon']['tmp_name'], '../images/'.$icon);

$image = time().'-'.$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$image);

insert_db(
    $connection,
    'services',
    [
        'title'=>$_POST['title'],
        'category_id'=>$_POST['category_id'],
        'icon'=>$icon,
        'image'=>$image,
        'short_description'=>$_POST['short_description'],
        'long_description'=>$_POST['long_description'],
        'seo_title'=>$_POST['seo_title'],
        'seo_description'=>$_POST['seo_description']
    ]
);

redirect("index.php");

?>
