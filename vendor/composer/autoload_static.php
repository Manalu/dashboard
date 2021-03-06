<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9bff87cf85f8e042dd467d43d0fb4cc9
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Config\\' => 7,
        ),
        'B' => 
        array (
            'Base\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Config',
        ),
        'Base\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Base',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9bff87cf85f8e042dd467d43d0fb4cc9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9bff87cf85f8e042dd467d43d0fb4cc9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
