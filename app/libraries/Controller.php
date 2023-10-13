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
    $modelPath = '../app/models/' . $model . '.php';

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
  // Load view
  public function view($view, $data = [])
  {
    // Extract the data array to variables
    extract($data);

    // Check for view file
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once '../app/views/' . $view . '.php';
    } else {
      // View does not exist
      die('View does not exist');
    }
  }
}
