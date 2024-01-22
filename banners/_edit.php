<?php

include_once('../module.php');
include_once('../database.php');
$connection = connect_db();

$mobile_image = $_POST['old_mobile_image'];
if ($_FILES['mobile_image']['name'] != ''){
    $mobile_image = time().'-'.$_FILES['mobile_image']['name'];
    move_uploaded_file($_FILES['mobile_image']['tmp_name'], '../images/'.$mobile_image);
}

$desktop_image = $_POST['old_desktop_image'];
if ($_FILES['desktop_image']['name'] != ''){
    $desktop_image = time().'-'.$_FILES['desktop_image']['name'];
    move_uploaded_file($_FILES['desktop_image']['tmp_name'], '../images/'.$desktop_image);
}

update_db(
    $connection,
    'banners',
    [
        'title'=>$_POST['title'],
        'link'=>$_POST['link'],
        'position'=>$_POST['position'],
        'mobile_image'=>$mobile_image,
        'desktop_image'=>$desktop_image
    ],
    [
        'id'=>$_POST['id']
    ]
);

redirect("index.php");

?>
