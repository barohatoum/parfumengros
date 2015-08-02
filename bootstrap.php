<?php

	# Global variables
	defined('DS') 		? null : define('DS', DIRECTORY_SEPARATOR);
	defined('ROOT') 	? null : define('ROOT', __DIR__);
	defined('INC') 		? null : define('INC', ROOT . DS . 'inc');
	defined('CONFIG') 	? null : define('CONFIG', ROOT . DS . 'config');
	defined('LOCALE') 	? null : define('LOCALE', ROOT . DS . 'locale');
	defined('LOGS') 	? null : define('LOGS', ROOT . DS . 'logs');

	# debug mode
	$_debug = true;
	error_reporting(E_ALL);
	ini_set('log_errors', LOGS . DS . 'errors' . DS . date('Ymd') . 'log');
	($_debug) ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

	# language
	$language = (isset($_GET['language'])) ? ($_GET['language'] === 'en') ? 'en' : 'fr' : 'fr';
	setLocale($language);

	# app settings
	$app                 = new StdClass();
	$app->name           = 'Parfum en gros';
	$app->version        = 1.0;
	$app->author         = 'Ibrahim Hatoum <ibrahim.hatoum@gmail.com>';
	$app->copyright      = 'Parfum en gros ' . date('Y');
	$app->urls           = new StdClass();
	$app->urls->protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';
	$app->urls->hostname = (isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : 'parfumengros.ca';
	$app->urls->root     = $app->urls->protocol . $app->urls->hostname;
	$app->urls->seo      = $app->urls->root . '/' . $language;
	$app->urls->api      = $app->urls->root . '/api';
	$app->urls->assets   = $app->urls->root . '/assets';
