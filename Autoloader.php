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
        elseif(file_exists('core/'.$class.'.php')){
            require 'core/'.$class.'.php';
        }
        elseif(file_exists('core/config/'.$class.'.php')){
            require 'core/config/'.$class.'.php';
        }
        elseif(file_exists('controllers/'.$class.'.php')){
            require 'controllers/'.$class.'.php';
        }
        elseif(file_exists('models/'.$class.'.php')){
            require 'models/'.$class.'.php';
        }
        
    }
}
