<?php
class Pages extends Controller
{
  private $courseModel;  // Define the $courseModel property

  public function __construct()
  {
    $this->courseModel = $this->model('Course'); // Instantiate the Course model
  }

  public function index()
  {
    $data = [
      'title' => 'School Portal',
      'description' => 'Learning'
    ];

    $this->view('pages/index', $data);
  }

  public function contact()
  {
    $data = [
      'title' => 'Contact Us',
      'description' => 'Fill out form to contact our support team.'
    ];

    $this->view('pages/contact', $data);
  }

  public function course()
  {
    $courseModel = $this->model('Course');
    $courses = $courseModel->getAllCourses();

    $data = [
      'title' => 'Available Courses',
      'courses' => $courses
    ];

    $this->view('pages/course', $data);
  }
}
