<?php
/*
   * Base Controller
   * Loads the models and views
   */
class Controller
{
  // Load model
  public function model($model)
  {
    // Require model file using the APPROOT constant
    $filePath = APPROOT . '/model/' . $model . '.php';
    if (file_exists($filePath)) {
      require_once $filePath;
    } else {
      die("File not found: " . $filePath);
    }
    // Instatiate model
    return new $model();
  }

  // Load view
  public function view($view, $data = [])
  {
    // Check for view file using the APPROOT constant
    if (file_exists(APPROOT . '/views/' . $view . '.php')) {
      require_once APPROOT . '/views/' . $view . '.php';
    } else {
      // View does not exist
      die('View does not exist');
    }
  }
}
