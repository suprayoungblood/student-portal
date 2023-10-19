<?php
session_start(); // Add this line to start the session

// Load Config
require_once 'config/config.php';

// Autoload Core Libraries
spl_autoload_register(function ($className) {
  if (file_exists(__DIR__ . '/libraries/' . $className . '.php')) {
    require_once __DIR__ . '/libraries/' . $className . '.php';
  }
});
