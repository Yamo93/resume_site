<?php
session_start();
// /* Lokal utveckling */
// define("DB_HOST", 'localhost');
// define("DB_USERNAME", 'yamo93');
// define("DB_PASSWORD", '12345');
// define("DB_NAME", 'resume_site');
include_once('properties.php');
function my_autoloader($class) {
    include 'classes/' . $class . '.class.php';
}
spl_autoload_register('my_autoloader');
error_reporting(E_ALL); 
ini_set('display_errors', TRUE); 
ini_set('display_startup_errors', TRUE);
?>