<?php

require_once '/var/lib/symfony/1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins([
      'sfDoctrinePlugin',
      'sfDoctrineGuardPlugin',
    ]);
    // enable test environment
    // $this->setEnvironment('test');
  }
}
