<?php

use App\Controllers\Demo\DemoController;

$Route->map('GET', '/api', [DemoController::getInstance(), 'api']);
