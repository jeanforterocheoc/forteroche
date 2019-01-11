<?php
class Autoloader
{
    public static function register ()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload ($class)
    {
        $class = $class = str_replace('blog_forteroche\\', '', $class);
        require $class.'.php';
    }
}