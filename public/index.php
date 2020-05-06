<?php

use App\Kernel;

session_start();

require '../config/config.php';
require '../helpers/default.php';
require '../vendor/autoload.php';

$app = Kernel::app();
$app->start();