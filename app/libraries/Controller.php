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
    // Create the path to the model
    $modelPath = APPROOT . '/models/' . $model . '.php';

    // Displaying the model path
    //echo "Checking for file: " . $modelPath . "<br>";

    // Check if the file exists
    if (file_exists($modelPath)) {
      // Require model file
      require_once $modelPath;

      // Instantiate the model and return it
      return new $model();
    } else {
      // Model file doesn't exist
      die('Model ' . $model . ' does not exist');
    }
  }

  // Load view
  public function view($view, $data = [])
  {
    // Create the full path for the view
    $viewPath = APPROOT . '/views/' . $view . '.php';

    // Check if the view file exists
    if (file_exists($viewPath)) {
      require_once $viewPath;
    } else {
      die("View file does not exist: " . $viewPath);
    }
  }
}
