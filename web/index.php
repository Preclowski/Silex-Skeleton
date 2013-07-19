<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application(array(
	'debug' => true,
));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->register(new SilexAssetic\AsseticServiceProvider(), array(
	'assetic.path_to_web' => __DIR__ . '/assets',
	'assetic.options' => array(
    	'debug' => true,
    	'auto_dump_assets' => true,
    	'formulae_cache_dir' => __DIR__ . '../cache/assetic',
	),
));

$app->get('/hello', function() use ($app) {
    return $app['twig']->render('hello.twig.html');
});

$app->run();
