<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf05dd54cd413b651c42ed8b0436db31b
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hillel\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hillel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf05dd54cd413b651c42ed8b0436db31b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf05dd54cd413b651c42ed8b0436db31b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
