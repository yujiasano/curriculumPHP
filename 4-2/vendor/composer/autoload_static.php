<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb885c45cd3dbef7a2b1ac114ccc3d0d
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitbb885c45cd3dbef7a2b1ac114ccc3d0d::$classMap;

        }, null, ClassLoader::class);
    }
}
