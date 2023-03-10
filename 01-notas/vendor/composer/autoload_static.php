<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb4d4a08c75eff631deeb226aef872135
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Notas\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Notas\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb4d4a08c75eff631deeb226aef872135::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb4d4a08c75eff631deeb226aef872135::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb4d4a08c75eff631deeb226aef872135::$classMap;

        }, null, ClassLoader::class);
    }
}
