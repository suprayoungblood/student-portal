<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

require_once '../app/bootstrap.php';

// Init Core Library
$init = new Core;