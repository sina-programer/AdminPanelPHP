<?php

include_once('../module.php');
include_once('../database.php');
$connection = connect_db();

insert_db(
    $connection,
    'products',
    [
        'title_fa'=>$_POST['title_fa'],
        'title_en'=>$_POST['title_en'],
        'category_id'=>$_POST['category_id'],
        'price'=>$_POST['price'],
        'discount_price'=>$_POST['discount_price'],
        'properties'=>$_POST['properties'],
        'usage_tips'=>$_POST['usage_tips'],
        'seo_title'=>$_POST['seo_title'],
        'seo_description'=>$_POST['seo_description']
    ]
);

redirect("index.php");

?>
