<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// DEPENDENCIES
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/rest.php";
require_once __DIR__ . "/../src/json2csv.php";

// INITIALIZE COOKIE SESSION

// INITIALIZE APPLICATION
$app = new Silex\Application();
$app['debug'] = true;
$app['rest'] = new Rest();
$app['rest_url'] = 'https://jsonplaceholder.typicode.com';

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . "/../views"
));

// SET LAYOUT
$app->before(function () use ($app) {
    $app['twig']->addGlobal('layout', null);
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout.html.twig'));
});

// ROUTES
// Display index page
$app->get('/', function() use ($app) {
    return $app['twig']->render('index.html.twig');
});

// Display userlist page
$app->get('/users', function() use($app) {
    $users = json_decode($app['rest']->url($app['rest_url'] . '/users')->get());
   return $app['twig']->render('users.html.twig', array(
       'users' => $users
   ));
});

// Download CSV file
$app->get('/getcsv', function() use($app) {
    $csv = new JSON2CSVutil();
    $csv->dataArray = json_decode($app['rest']->url($app['rest_url'] . '/users')->get(), true);
    $csv->flattenDL('users.csv');
    exit;
});

return $app;
?>
