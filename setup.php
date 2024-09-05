<?php
    $mysqli = new mysqli("localhost","root","Jorg€94","miranda");
        
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
  
    $rooms = $mysqli -> query('SELECT * FROM rooms');
    $row = $rooms -> fetch_assoc();

    require_once('./BladeOne.php');
    use eftec\bladeone\BladeOne;

    $views = __DIR__ . '/views';
    $cache = __DIR__ . '/cache';
    $blade = new BladeOne($views,$cache,BladeOne::MODE_DEBUG);