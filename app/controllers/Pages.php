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
    $userId = $_SESSION['user_id'];
    $courses = $courseModel->getUserCourses($userId);

    //echo '<pre>'; print_r($courses); die; 
    //var_dump($courses);  // This will print the courses to the screen. Remove this after debugging.


    $data = [
      'title' => 'Available Courses',
      'courses' => $courses
    ];
    $this->view('pages/course', $data);
  }


  public function courseadd() {

      $courseModel = $this->model('Course');
      $courses = $courseModel->getAllCourses();
      $userId = $_SESSION['user_id'];

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $_POST['course_name'] = strip_tags($_POST['course_name']);
          $_POST['description'] = strip_tags($_POST['description']); 
 

          $data = [ 
              'course_name' => trim($_POST['course_name']),
              'description' => trim($_POST['description']), 
              'user_id' => $userId, 
              'course_name_err' => '',
              'description_err' => '', 
              'title' => 'Add Courses',
              'courses' => $courses
          ];

          if(empty($_POST['course_name'])) {
            $data['course_name_err'] = 'Course is required';
          }
          if(empty($_POST['description'])) {
            $data['description_err'] = 'Description is required';
          }

          //echo '<pre>'; print_r($data); die; 
 

          // Additional validation can be added here

          if (empty($data['course_name_err']) && empty($data['description_err'])) {
              if ($this->courseModel->usercourseSave($data)) {
                  header('Location: ' . URLROOT . '/pages/course');
              } else {
                  die('Something went wrong');
              }
          } else {
              $this->view('pages/courseadd', $data);
          }


      } else {

          $data = [
              'course_name' => '',
              'description' => '',
              'course_name_err' => '',
              'description_err' => '', 
              'title' => 'Add Courses',
              'courses' => $courses
          ]; 

          $this->view('pages/courseadd', $data);
      }

  }


  public function coursedelete($id=null)
  {
 
      if (!isset($id)) {
          header('Location: ' . URLROOT . '/pages/course');
          exit();
      }
 
      if ($this->courseModel->deleteCourse($id)) { 
          header('Location: ' . URLROOT . '/pages/course');
      } else {
          die('Something went wrong');
      }
      
  }



  
  public function class()
  {
    $courseModel = $this->model('Course');
    $userId = $_SESSION['user_id'];
    $courses = $courseModel->getClassCourses($userId);

    //echo '<pre>'; print_r($courses); die; 
    //var_dump($courses);  // This will print the courses to the screen. Remove this after debugging. 

    $data = [
      'title' => 'Available Class',
      'courses' => $courses
    ];
    $this->view('pages/class', $data);
  }


  public function classadd() {

      $courseModel = $this->model('Course');
      $userId = $_SESSION['user_id'];
      $courses = $courseModel->getUserCourses($userId); 

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $_POST['course_name'] = strip_tags($_POST['course_name']);
          $_POST['date'] = strip_tags($_POST['date']); 
 

          $data = [ 
              'course_name' => trim($_POST['course_name']),
              'date' => trim($_POST['date']), 
              'user_id' => $userId, 
              'course_name_err' => '',
              'date_err' => '', 
              'title' => 'Add Courses',
              'courses' => $courses
          ];

          if(empty($_POST['course_name'])) {
            $data['course_name_err'] = 'Course is required';
          }
          if(empty($_POST['date'])) {
            $data['date_err'] = 'Date is required';
          }

          //echo '<pre>'; print_r($data); die; 
 

          // Additional validation can be added here

          if (empty($data['course_name_err']) && empty($data['description_err'])) {
              if ($this->courseModel->userclassSave($data)) {
                  header('Location: ' . URLROOT . '/pages/class');
              } else {
                  die('Something went wrong');
              }
          } else {
              $this->view('pages/classadd', $data);
          }


      } else {

          $data = [
              'course_name' => '',
              'date' => '',
              'course_name_err' => '',
              'date_err' => '', 
              'title' => 'Add Class',
              'courses' => $courses
          ]; 

          $this->view('pages/classadd', $data);
      }

  }


  public function classdelete($id=null)
  {
 
      if (!isset($id)) {
          header('Location: ' . URLROOT . '/pages/class');
          exit();
      }
 
      if ($this->courseModel->deleteClass($id)) { 
          header('Location: ' . URLROOT . '/pages/class');
      } else {
          die('Something went wrong');
      }
      
  }

   

}