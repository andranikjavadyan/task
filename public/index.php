<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(1);
ini_set('display_errors', 1);

session_start();
//print_r(phpinfo());die;
include ('../autoload.php');
global_connection('mysql');


$routes = include '../routes/web.php';
