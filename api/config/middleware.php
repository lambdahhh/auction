<?php

use Slim\App;

return static function(App $app, $container) {
    $app->addErrorMiddleware($container->get('config')['debug'], true, true);
};
