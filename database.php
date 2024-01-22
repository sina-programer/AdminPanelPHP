<?php

include_once('module.php');


function connect_db($db_name='admin_panel', $host='localhost', $user='root', $password='', $port=3306){
    try{
        return new PDO("mysql:host=$host;dbname=$db_name;port=$port", $user, $password);
    }
    catch(PDOException $error){
        echo 'connection failed: ' . $error->getMessage();
    }
}


function insert_db($connection, $table, $parameters){
    $keys = array_keys($parameters);
    $values = array_map("to_parameter", $keys);

    $str_keys = implode(', ', $keys);
    $str_values = implode(', ', $values);

    $query = $connection->prepare("INSERT INTO $table($str_keys) VALUES ($str_values)");
    return $query->execute($parameters);
}


function update_db($connection, $table, $parameters, $conditions){
    $conditions_string = to_query($conditions);

    $new_values = [];
    foreach (array_keys($parameters) as $key){
        array_push($new_values, "$key=:$key");
    }
    $new_values = implode(', ', $new_values);

    $query = $connection->prepare("UPDATE $table SET $new_values WHERE $conditions_string");
    return $query->execute($parameters);
}


function delete_db($connection, $table, $conditions){
    $conditions_string = to_query($conditions);
    $query = $connection->prepare("DELETE FROM $table WHERE $conditions_string");
    return $query->execute($parameters);
}


$connection = connect_db();

?>
