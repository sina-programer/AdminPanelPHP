<?php

include_once('../module.php');
include_once('../database.php');
$connection = connect_db();

$mobile_image = time().'-'.$_FILES['mobile_image']['name'];
move_uploaded_file($_FILES['mobile_image']['tmp_name'], '../images/'.$mobile_image);

$desktop_image = time().'-'.$_FILES['desktop_image']['name'];
move_uploaded_file($_FILES['desktop_image']['tmp_name'], '../images/'.$desktop_image);

insert_db(
    $connection,
    'banners',
    [
        'title'=>$_POST['title'],
        'link'=>$_POST['link'],
        'position'=>$_POST['position'],
        'mobile_image'=>$mobile_image,
        'desktop_image'=>$desktop_image
    ]
);

redirect("index.php");

?>
