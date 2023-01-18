<?php

if (isset ($_GET['views'])) {
    $views = $_GET['views'];
    
    require 'src/views/'.$views.'.php';
}else{
    require 'src/views/home.php';
}