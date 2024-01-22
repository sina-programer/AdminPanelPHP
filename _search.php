<?php

include_once('module.php');

$url = $_POST['url'];

$filters = [];
foreach($_POST as $key=>$value){
    if(($value != '') && ($key != 'url')){
        array_push($filters, "$key=$value");
    }
}

if(count($filters) > 0){
    $url .= ('?' . implode('&', $filters));
}

redirect($url);

?>
