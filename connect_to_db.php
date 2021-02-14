<?php

function OpenCon()
 {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'test';
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db, 3306);
    
    return $conn;
 
 }

   
?>