<?php

require_once '/var/lib/symfony/1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
    static protected $zendLoaded = false;
    
    public function setup()
    {
        $this->enablePlugins([
            'sfDoctrinePlugin',
            'sfDoctrineGuardPlugin',
        ]);
        // enable test environment
        // $this->setEnvironment('test');
    }

    static public function registerZend()
    {
        if (self::$zendLoaded) {
            return;
        }

        set_include_path(sfConfig::get('sf_lib_dir') . '/vendor' . PATH_SEPARATOR . get_include_path());
        require_once sfConfig::get('sf_lib_dir') . '/vendor/Zend/Loader/Autoloader.php';
        Zend_Loader_Autoloader::getInstance();
        self::$zendLoaded = true;
    }
}
