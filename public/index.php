<?php

use App\Core\App;

session_start();

require_once '../app/core/init.php';

$app = new App;
$app->loadController();
