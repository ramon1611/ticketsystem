<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit01e1cd5d74ea132d72c94bda0f4e4531
{
    public static $files = array (
        'f084d01b0a599f67676cffef638aa95b' => __DIR__ . '/..' . '/smarty/smarty/libs/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'r' => 
        array (
            'ramon1611\\Libs\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ramon1611\\Libs\\' => 
        array (
            0 => __DIR__ . '/..' . '/ramon1611/sqlquerybuilder/libs',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit01e1cd5d74ea132d72c94bda0f4e4531::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit01e1cd5d74ea132d72c94bda0f4e4531::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
