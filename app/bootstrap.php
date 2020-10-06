<?php

include_once __DIR__ .'/config/config.php';

spl_autoload_register(function($class){
    if(file_exists(LIB_ROOT . "$class.php")){
        include_once LIB_ROOT . "$class.php";
    }
});