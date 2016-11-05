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

$files = glob(__DIR__ . '/framework/*/index.php');
foreach($files as $file){
	include $file;
}
