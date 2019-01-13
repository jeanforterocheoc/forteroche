<?php

// Charge automatiquement les classes
class Autoloader 
{
    // Enregistre les classes appellées
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    // Inclut la classe appellée
    private static function autoload($class)
    {
        $class = str_replace('blog_forteroche\\', '', $class);
        if(file_exists($class.'.php'))
        {
            require $class.'.php';
        }
        elseif(file_exists( '../app/core/'.$class.'.php')){
            require '../app/core/'.$class.'.php';
        }
        elseif(file_exists('../app/core/'.$class.'.php')){
            require '../app/core/'.$class.'.php';
        }
        elseif(file_exists('../app/controllers/'.$class.'.php')){
            require '../app/controllers/'.$class.'.php';
        }
        elseif(file_exists('../app/models/'.$class.'.php')){
            require '../app/models/'.$class.'.php';
        }
        elseif(file_exists('../app/models/manager/'.$class.'.php')){
            require '../app/models/manager/'.$class.'.php';
        }
        elseif(file_exists('../app/views/'.$class.'.php')){
            require '../app/views/'.$class.'.php';
        }
        
    }
}
