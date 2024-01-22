<?php

include_once('../module.php');
include_once('../database.php');
$connection = connect_db();

$icon = $_POST['old-icon'];
if ($_FILES['icon']['name'] != ''){
    $icon = time().'-'.$_FILES['icon']['name'];
    move_uploaded_file($_FILES['icon']['tmp_name'], '../images/'.$icon);
}

$image = $_POST['old-image'];
if ($_FILES['image']['name'] != ''){
    $image = time().'-'.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$image);
}

update_db(
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
    ],
    [
        'id'=>$_POST['id']
    ]
);

redirect("index.php");

?>
