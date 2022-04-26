<?php

use App\Controllers\PostController;

$app->get('/posts', PostController::class . ':index');
$app->post('/posts', PostController::class . ':create');
