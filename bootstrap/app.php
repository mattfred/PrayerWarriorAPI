<?php
/**
 * Created by IntelliJ IDEA.
 * User: Matthew
 * Date: 11/21/2016
 * Time: 7:00 PM
 */

require __DIR__.'/../vendor/autoload.php';
require 'dbconfig.php';

spl_autoload_register(function ($classname) {
    require ("../models/" . $classname . ".php");
});

$db_config = new dbconfig();
$config['displayErrorDetails'] = true;
$config['db']['host'] = $db_config->host;
$config['db']['user'] = $db_config->user;
$config['db']['pass'] = $db_config->pass;

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();

$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO($db['host'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('/', [
        'cache' => 'false'
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('../index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

require __DIR__.'/../app/routes.php';
