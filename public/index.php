<?php

require '../vendor/autoload.php';

$app = Travelience\Aida\Application::getInstance();
$app->withDatabase();
$app->run();