<?php
include('config.php');

session_name(APP_NAME);
session_start();

require_once('routes.php');

/*
|-------------------------------------------------------
| AUTOLOADER
|-------------------------------------------------------
|
| Autoload Framework function in /framework/ directory
| depending on some configuration (DEBUG_LVL, DB_TYPE, etc).
| Note that only the index.php file of each folder is loaded.
|
*/

//load these files first
require_once __DIR__ . '/framework/debugging/index.php';
require_once __DIR__ . '/framework/display/index.php';
require_once __DIR__ . '/framework/routing/index.php';

//load other folders
$files = glob(__DIR__ . '/framework/*/index.php');
foreach($files as $file){
	require_once $file;
}
//launch routing
init_routing($routes);
