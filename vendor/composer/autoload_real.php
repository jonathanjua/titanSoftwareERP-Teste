<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit59401e0b817f4e8fe0c2ed3d61ec85c7
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit59401e0b817f4e8fe0c2ed3d61ec85c7', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit59401e0b817f4e8fe0c2ed3d61ec85c7', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit59401e0b817f4e8fe0c2ed3d61ec85c7::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
