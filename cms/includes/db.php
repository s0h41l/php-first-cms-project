<?php
ob_start();
session_start() ?>
<?php

    $db['db_host']='localhost';
    $db['db_usr']='root';
    $db['db_pass']='';
    $db['db_name']='cms';
    foreach($db as $key => $value){
      define(strtoupper($key),$value);  //Defining constants
    }
    $connection=mysqli_connect(DB_HOST,DB_USR,DB_PASS,DB_NAME);
    if(!$connection){
      die("Failed to connect");
    }
 ?>
