<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('memory_limit', '1024M');


// Start the session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once '../app/bootstrap.php';

// Init Core Library
$init = new Core;
