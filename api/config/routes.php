<?php

use Slim\App;
use App\Http\Action\HomeAction;

return static function (App $app): void {
    $app->get('/', HomeAction::class);
};
