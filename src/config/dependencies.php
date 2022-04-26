<?php

$container = $app->getContainer();

// Activating routes in a subfolder
$container['environment'] = function () {
	$scriptName = $_SERVER['SCRIPT_NAME'];
	$_SERVER['SCRIPT_NAME'] = dirname(dirname($scriptName)) . '/' . basename($scriptName);
	return new Slim\Http\Environment($_SERVER);
};
