<?php

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;

return static function(ContainerInterface $container): App
{
    $app = AppFactory::create(null, $container);

    (require __DIR__ . '/middleware.php')($app, $container);
    (require __DIR__ . '/routes.php')($app);

    return $app;
};
