<?php

include_once('module.php');
include_once('database.php');

$email = $_POST['email'];
$password = $_POST['password'];

$admin = $connection->query("SELECT * FROM admins WHERE email='$email'")->fetch();
if($admin){
    if(password_verify($password, $admin['password'])){
        $_SESSION['login'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        redirect('index.php');
    }else{
        redirect('login.php?error=رمز نامعتبر');
    }
}else{
    redirect('login.php?error=ایمیل نامعتبر');
}

?>
