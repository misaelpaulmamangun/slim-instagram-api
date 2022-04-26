<?php

require __DIR__ . './../vendor/autoload.php';

$config = require __DIR__ . './config/settings.php';

$app = new \Slim\App($config);

// Dependencies
require __DIR__ . './config/dependencies.php';

// Middlewares
require __DIR__ . './config/middleware.php';

// Routes
require __DIR__ . './app/routes.php';
