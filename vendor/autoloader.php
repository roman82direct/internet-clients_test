<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/Database.php');


    function classAutoload(string $className){
        require_once($_SERVER['DOCUMENT_ROOT'].'/'.$className.'.php');
    };

    spl_autoload_register('classAutoload');


