<?php

    if(!function_exists('classAutoLoader')){

        function classAutoLoader($class){
            $class=ucfirst($class);
            $classFile=$_SERVER['DOCUMENT_ROOT'].'/Life_City/classes/'.$class.'.php';

            if(is_file($classFile)&&!class_exists($class)) 
                require_once $classFile;
        }

    }

    //Autoload the class specified
    spl_autoload_register('classAutoLoader');