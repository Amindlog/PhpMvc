<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbbba54bb71bddafe0cc80c6565414d7d
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbbba54bb71bddafe0cc80c6565414d7d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbbba54bb71bddafe0cc80c6565414d7d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbbba54bb71bddafe0cc80c6565414d7d::$classMap;

        }, null, ClassLoader::class);
    }
}
