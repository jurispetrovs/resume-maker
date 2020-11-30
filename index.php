<?php

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

require_once 'vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function database(): Connection
{
    $connectionParams = [
        'dbname' => $_ENV['DB_DATABASE'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
        'host' => $_ENV['DB_HOST'],
        'driver' => 'pdo_mysql',
    ];

    $connection = DriverManager::getConnection($connectionParams);
    $connection->connect();

    return $connection;
}

function query(): QueryBuilder
{
    return database()->createQueryBuilder();
}

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $namespace = '\App\Controllers\\';

    $r->addRoute('GET', '/', $namespace . 'WelcomeController@index');
    $r->addRoute('GET', '/resume/{id}', $namespace . 'ResumesController@index');
    $r->addRoute('GET', '/create-resume', $namespace . 'ResumesController@show');
    $r->addRoute('POST', '/create-resume/create', $namespace . 'ResumesController@create');
    $r->addRoute('DELETE', '/resume/{id}', $namespace . 'ResumesController@delete');

    $r->addRoute('POST', '/resume/person/{id}/edit', $namespace . 'PersonsController@edit');
    $r->addRoute('PUT', '/resume/person/{id}/edit', $namespace . 'PersonsController@update');

    $r->addRoute('POST', '/resume/{id}/education/{education-id}/edit', $namespace . 'EducationsController@edit');
    $r->addRoute('PUT', '/resume/{id}/education/{education-id}/edit', $namespace . 'EducationsController@update');
    $r->addRoute('DELETE', '/resume/{id}/education/{education-id}', $namespace . 'EducationsController@delete');

    $r->addRoute('POST', '/resume/{id}/education/new', $namespace . 'EducationsController@create');
    $r->addRoute('PUT', '/resume/{id}/education/new', $namespace . 'EducationsController@insert');

    $r->addRoute('POST', '/resume/{id}/workplace/{workplace-id}/edit', $namespace . 'WorkplacesController@edit');
    $r->addRoute('PUT', '/resume/{id}/workplace/{workplace-id}/edit', $namespace . 'WorkplacesController@update');
    $r->addRoute('DELETE', '/resume/{id}/workplace/{workplace-id}', $namespace . 'WorkplacesController@delete');

    $r->addRoute('POST', '/resume/{id}/workplace/new', $namespace . 'WorkplacesController@create');
    $r->addRoute('PUT', '/resume/{id}/workplace/new', $namespace . 'WorkplacesController@insert');

});

// Fetch method and URI from somewhere
$httpMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 PAGE NOT FOUND';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo 'METHOD NOT ALLOWED';
        break;
    case FastRoute\Dispatcher::FOUND:
        [$controller, $method] = explode('@', $routeInfo[1]);
        $vars = $routeInfo[2];

        (new $controller)->$method($vars);

        break;
}