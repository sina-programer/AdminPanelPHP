<?php

include_once('module.php');
$_SESSION['login'] = false;
redirect(get_url('login.php'));

?>
