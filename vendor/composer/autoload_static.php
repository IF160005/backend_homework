<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit37902eb8e9e9c8d8e0da158c65f469e8
{
    public static $files = array (
        '46d9454e675d5562a7672efabc7b14b0' => __DIR__ . '/../..' . '/src/File1.php',
        '950f2c7cbbb79faf50a41377597c26d9' => __DIR__ . '/../..' . '/src/File2.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MathPHP\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MathPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/markrogoyski/math-php/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit37902eb8e9e9c8d8e0da158c65f469e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit37902eb8e9e9c8d8e0da158c65f469e8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
