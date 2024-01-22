<?php

session_start();

function get_base_url($secure=False){
    if ($secure){
        $request = 'https';
    } else {
        $request = 'http';
    }
    $host = $_SERVER['HTTP_HOST'];
    $domain = explode('/', $_SERVER['PHP_SELF'])[1];
    return "$request://$host/$domain";
}

function get_url(...$levels){
    return get_base_url() . "/" . implode($levels, '/');
}


function validate_session($login=false, $admin_id=null, ...$parameters){
    $parameters = array_merge($parameters, ['login'=>$login, 'admin_id'=>$admin_id]);
    var_dump($parameters);
    foreach($parameters as $key=>$value){
        if(!isset($_SESSION[$key])){
            echo "set '$key' = '$value'";
            $_SESSION[$key] = $value;
        }
    }
}

function is_login(){
    if($_SESSION['login']==true){
        return true;
    }else{
        return false;
    }
}

function handle_admin(){
    if(!is_login()){
        redirect(get_url('login.php'));
    }
}


function redirect($url){
    header("Location: $url");
}


function to_parameter($name){
    return ':'.$name;
}

function to_query($array, $separator=', ', $delimiter='='){
    $new_array = [];
    foreach($array as $key=>$value){
        array_push($new_array, "$key $delimiter $value");
    }

    return implode($new_array, $separator);
}

function get_items($array){
    return array_map(null, array_keys($array), array_values($array));
}


// validate_session();

?>
