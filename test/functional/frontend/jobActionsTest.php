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
 
// $browser->info('1 - The homepage')->
//   get('/')->
//   with('request')->begin()->
//     isParameter('module', 'job')->
//     isParameter('action', 'index')->
//   end()->
//   with('response')->begin()->
//     info('  1.1 - Expired jobs are not listed')->
//     checkElement('.jobs td.position:contains("expired")', false)->
//   end()
// ;
 
// $max = sfConfig::get('app_max_jobs_on_homepage');
 
// $browser->info('1 - The homepage')->
//   info(sprintf('  1.2 - Only %s jobs are listed for a category', $max))->
//   with('response')->
//     checkElement('.category_programming tr', $max)
// ;
 
// $browser->info('1 - The homepage')->
//   get('/')->
//   info('  1.3 - A category has a link to the category page only if too many jobs')->
//   with('response')->begin()->
//     checkElement('.category_design .more_jobs', false)->
//     checkElement('.category_programming .more_jobs')->
//   end()
// ;
 
// $browser->info('1 - The homepage')->
//   info('  1.4 - Jobs are sorted by date')->
//   with('response')->begin()->
//     checkElement(sprintf('.category_programming tr:first a[href*="/%d/"]', $browser->getMostRecentProgrammingJob()->getId()))->
//   end()
// ;
 
// $job = $browser->getMostRecentProgrammingJob();
 
// $browser->info('2 - The job page')->
//   get('/')->
 
//   info('  2.1 - Each job on the homepage is clickable and give detailed information')->
//   click('Web Developer', array(), array('position' => 1))->
//   with('request')->begin()->
//     isParameter('module', 'job')->
//     isParameter('action', 'show')->
//     isParameter('company_slug', $job->getCompanySlug())->
//     isParameter('location_slug', $job->getLocationSlug())->
//     isParameter('position_slug', $job->getPositionSlug())->
//     isParameter('id', $job->getId())->
//   end()->
 
//   info('  2.2 - A non-existent job forwards the user to a 404')->
//   get('/job/foo-inc/milano-italy/0/painter')->
//   with('response')->isStatusCode(404)->
 
//   info('  2.3 - An expired job page forwards the user to a 404')->
//   get(sprintf('/job/sensio-labs/paris-france/%d/web-developer', $browser->getExpiredJob()->getId()))->
//   with('response')->isStatusCode(404)
// ;

// $browser->with('response')->debug();

// $browser->info('3 - Post a Job page');
// $browser->info('  3.1 - Submit a Job');
// $browser->get('/job/new');
// $browser->with('request');
// $browser->begin();
// $browser->isParameter('module', 'job');
// $browser->isParameter('action', 'new');
// $browser->end();

// $browser->click('Preview your job', array('job' => array(
//   'company'      => 'Sensio Labs',
//   'url'          => 'http://www.sensio.com/',
//   'logo'         => sfConfig::get('sf_upload_dir').'/jobs/sensio-labs.gif',
//   'position'     => 'Developer',
//   'location'     => 'Atlanta, USA',
//   'description'  => 'You will work with symfony to develop websites for our customers.',
//   'how_to_apply' => 'Send me an email',
//   'email'        => 'for.a.job@example.com',
//   'is_public'    => false,
//   'is_activated' => false,
// )));
// $browser->with('request');
// $browser->begin();
// $browser->isParameter('module', 'job');
// $browser->isParameter('action', 'create');
// $browser->end();

// $browser->with('form');
// $browser->debug();

// $browser->setTester('doctrine', 'sfTesterDoctrine');

// $browser->with('doctrine');
// $browser->begin();
// $browser->check('JobeetJob', array(
//     'location'     => 'Atlanta, USA',
//     'is_activated' => false,
//     'is_public'    => false,
// ));
// $browser->end();


// $browser->info('  3.5 - When a job is published, it cannot be edited anymore');
// $browser->createJob(array('position' => 'FOO3'), true);
// $browser->get(sprintf('/job/%s/edit', $browser->getJobByPosition('FOO3')->getToken()));
// $browser->with('response');
// $browser->begin();
// $browser->isStatusCode(404);
// $browser->end();

// $browser->info('  3.6 - A job validity cannot be extended before the job expires soon')->
//   createJob(array('position' => 'FOO4'), true)->
//   call(sprintf('/job/%s/extend', $browser->getJobByPosition('FOO4')->getToken()), 'put', array('_with_csrf' => true))->
//   with('response')->begin()->
//     isStatusCode(404)->
//   end()
// ;
 
// $browser->info('  3.7 - A job validity can be extended when the job expires soon')->
//   createJob(array('position' => 'FOO5'), true)
// ;
 
// $job = $browser->getJobByPosition('FOO5');
// $job->setExpiresAt(date('Y-m-d'));
// $job->save();
 
// $browser->
//   call(sprintf('/job/%s/extend', $job->getToken()), 'put', array('_with_csrf' => true))->
//   with('response')->isRedirected()
// ;
 
// $job->refresh();
// $browser->test()->is(
//   $job->getDateTimeObject('expires_at')->format('y/m/d'),
//   date('y/m/d', time() + 86400 * sfConfig::get('app_active_days'))
// );


// $browser->get('/job/new');
// $browser->click('Preview your job', array('job' => array(
//     'token' => 'fake_token',
//   )));
//   $browser->with('form');
//   $browser->begin();
//   $browser->hasErrors(7);
//   $browser->hasGlobalError('extra_fields');
//   $browser->end();


$browser->
  info('4 - User job history')->
 
  loadData()->
  restart()->
 
  info('  4.1 - When the user access a job, it is added to its history')->
  get('/')->
  click('Web Developer', array(), array('position' => 1))->
  get('/')->
  with('user')->begin()->
    isAttribute('job_history', array($browser->getMostRecentProgrammingJob()->getId()))->
  end()->
 
  info('  4.2 - A job is not added twice in the history')->
  click('Web Developer', array(), array('position' => 1))->
  get('/')->
  with('user')->begin()->
    isAttribute('job_history', array($browser->getMostRecentProgrammingJob()->getId()))->
  end()
;


$browser->setHttpHeader('X_REQUESTED_WITH', 'XMLHttpRequest');
$browser->
  info('5 - Live search')->
 
  get('/search?query=sens*')->
  with('response')->begin()->
    checkElement('table tr', 2)->
  end()
;