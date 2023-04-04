<?php

// include(dirname(__FILE__) . '/../../bootstrap/functional.php');

// $browser = new JobeetTestFunctional(new sfBrowser());
// $browser->loadData();

// $browser->info('1 - The homepage');

// $browser->get('/');
// $browser->with('request');
// $browser->begin();
// $browser->isParameter('module', 'job');
// $browser->isParameter('action', 'index');
// $browser->end();

// $browser->with('response');
// $browser->begin();
// $browser->info('  1.1 - Expired jobs are not listed');
// $browser->checkElement('.jobs td.position:contains("expired")', false);
// $browser->end();


// $max = sfConfig::get('app_max_jobs_on_homepage');

// $browser->info('1 - The homepage');
// $browser->get('/');
// $browser->info(sprintf('  1.2 - Only %s jobs are listed for a category', $max));
// $browser->with('response');
// $browser->checkElement('.category_programming tr', $max);

// $browser->info('1 - The homepfesfeage');
// $browser->get('/');
// $browser->info('  1.3 - A category has a link to the category page only if too many jobs');
// $browser->with('response');
// $browser->begin();
// $browser->checkElement('.category_design .more_jobs', false);
// $browser->checkElement('.category_programming .more_jobs');
// $browser->end();


// $q = Doctrine_Query::create()
//     ->select('j.*')
//     ->from('JobeetJob j')
//     ->leftJoin('j.JobeetCategory c')
//     ->where('c.slug = ?', 'programming')
//     ->andWhere('j.expires_at > ?', date('Y-m-d', time()))
//     ->orderBy('j.created_at DESC');

// $job = $q->fetchOne();

// $browser->info('1 - The homepage');
// $browser->get('/');
// $browser->info('  1.4 - Jobs are sorted by date');
// $browser->with('response');
// $browser->begin();
// $browser->checkElement(sprintf(
//     '.category_programming tr:first a[href*="/%d/"]',
//     $browser->getMostRecentProgrammingJob()->getId()
// ));
// $browser->end();



// $job = $browser->getMostRecentProgrammingJob();
 
// $browser->info('2 - The job page');
// $browser->get('/');
// $browser->info('  2.1 - Each job on the homepage is clickable and give detailed information');
// $browser->click('Web Developer', array(), array('position' => 1));
// $browser->with('request');
// $browser->begin();
// $browser->isParameter('module', 'job');
// $browser->isParameter('action', 'show');
// $browser->isParameter('company_slug', $job->getCompanySlug());
// $browser->isParameter('location_slug', $job->getLocationSlug());
// $browser->isParameter('position_slug', $job->getPositionSlug());
// $browser->isParameter('id', $job->getId());
// $browser->end();


include(dirname(__FILE__).'/../../bootstrap/functional.php');
 
$browser = new JobeetTestFunctional(new sfBrowser());
$browser->loadData();
 
$browser->info('1 - The homepage')->
  get('/')->
  with('request')->begin()->
    isParameter('module', 'job')->
    isParameter('action', 'index')->
  end()->
  with('response')->begin()->
    info('  1.1 - Expired jobs are not listed')->
    checkElement('.jobs td.position:contains("expired")', false)->
  end()
;
 
$max = sfConfig::get('app_max_jobs_on_homepage');
 
$browser->info('1 - The homepage')->
  info(sprintf('  1.2 - Only %s jobs are listed for a category', $max))->
  with('response')->
    checkElement('.category_programming tr', $max)
;
 
$browser->info('1 - The homepage')->
  get('/')->
  info('  1.3 - A category has a link to the category page only if too many jobs')->
  with('response')->begin()->
    checkElement('.category_design .more_jobs', false)->
    checkElement('.category_programming .more_jobs')->
  end()
;
 
$browser->info('1 - The homepage')->
  info('  1.4 - Jobs are sorted by date')->
  with('response')->begin()->
    checkElement(sprintf('.category_programming tr:first a[href*="/%d/"]', $browser->getMostRecentProgrammingJob()->getId()))->
  end()
;
 
$job = $browser->getMostRecentProgrammingJob();
 
$browser->info('2 - The job page')->
  get('/')->
 
  info('  2.1 - Each job on the homepage is clickable and give detailed information')->
  click('Web Developer', array(), array('position' => 1))->
  with('request')->begin()->
    isParameter('module', 'job')->
    isParameter('action', 'show')->
    isParameter('company_slug', $job->getCompanySlug())->
    isParameter('location_slug', $job->getLocationSlug())->
    isParameter('position_slug', $job->getPositionSlug())->
    isParameter('id', $job->getId())->
  end()->
 
  info('  2.2 - A non-existent job forwards the user to a 404')->
  get('/job/foo-inc/milano-italy/0/painter')->
  with('response')->isStatusCode(404)->
 
  info('  2.3 - An expired job page forwards the user to a 404')->
  get(sprintf('/job/sensio-labs/paris-france/%d/web-developer', $browser->getExpiredJob()->getId()))->
  with('response')->isStatusCode(404)
;

$browser->with('response')->debug();