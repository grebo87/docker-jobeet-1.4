<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

// $browser = new sfTestFunctional(new sfBrowser());

// $browser->
//   get('/affiliate/index')->

//   with('request')->begin()->
//     isParameter('module', 'affiliate')->
//     isParameter('action', 'index')->
//   end()->

//   with('response')->begin()->
//     isStatusCode(200)->
//     checkElement('body', '!/This is a temporary page/')->
//   end()
// ;

$browser = new JobeetTestFunctional(new sfBrowser());
$browser->loadData();
 
$browser->info('1 - An affiliate can create an account');
$browser->get('/affiliate/new');
$browser->click('Submit', array('jobeet_affiliate' => array(
    'url'                            => 'http://www.example.com/',
    'email'                          => 'foo@example.com',
    'jobeet_categories_list'         => array(Doctrine_Core::getTable('JobeetCategory')->findOneBySlug('programming')->getId()),
)));
$browser->with('response');
$browser->isRedirected();
$browser->followRedirect();
$browser->with('response');
$browser->checkElement('#content h1', 'Your affiliate account has been created');
$browser->info('2 - An affiliate must at least select one category');
$browser->get('/affiliate/new');
$browser->click('Submit', array('jobeet_affiliate' => array(
    'url'   => 'http://www.example.com/',
    'email' => 'foo@example.com',
)));
$browser->with('form');
$browser->isError('jobeet_categories_list');
