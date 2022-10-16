<?php

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            if (0 === strpos($class, 'App \\')){
                $class = substr_replace($class, 'src, 0, 3');
                $class = __DIR__ .'\\'.$class;
            }
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}

Autoloader::register();
