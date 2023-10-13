<?php
class Users extends Controller
{
    private $userModel;
    private $courseModel;


    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->courseModel = $this->model('Course');
    }

    public function index()
    {
        $data = [
            'title' => 'Student Portal',
            'description' => 'Manage student profiles'
        ];

        $this->view('users/register', $data);
    }

    public function displayCourses()
    {
        $courses = $this->courseModel->getAllCourses();

        $data = [
            'title' => 'All Courses',
            'courses' => $courses
        ];

        $this->view('pages/course', $data);
    }

    public function registerForCourse()
    {
        $courses = $this->courseModel->getAllCourses();

        $data = [
            'title' => 'Register for Courses',
            'courses' => $courses
        ];

        $this->view('users/register_for_course', $data);
    }

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST['email'] = strip_tags($_POST['email']);
            $_POST['password'] = strip_tags($_POST['password']);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Ensure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    $_SESSION['user_id'] = $loggedInUser->UserID;
                    $_SESSION['user_name'] = $loggedInUser->Name;
                    header('Location: ' . URLROOT . '/your_dashboard');
                } else {
                    $data['password_err'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            $this->view('users/login', $data);
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        session_destroy();
        header('Location: ' . URLROOT . '/users/login');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['name'] = strip_tags($_POST['name']);
            $_POST['email'] = strip_tags($_POST['email']);
            $_POST['phone'] = strip_tags($_POST['phone']);
            $_POST['password'] = strip_tags($_POST['password']);
            $_POST['confirm_password'] = strip_tags($_POST['confirm_password']);;

            $data = [
                'title' => 'Student Registration',
                'description' => 'Fill out form to register as a student.',
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Additional validation can be added here

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['phone_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    header('Location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('users/register', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'phone' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view('users/register', $data);
        }
    }

    public function profile()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . URLROOT . '/users/login');
            exit();
        }

        $user = $this->userModel->getUserById($_SESSION['user_id']);

        $data = [
            'title' => 'Profile',
            'user' => $user
        ];

        $this->view('pages/profile', $data);
    }

    public function edit()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . URLROOT . '/users/login');
            exit();
        }

        $user = $this->userModel->getUserById($_SESSION['user_id']);

        $data = [
            'title' => 'Edit Profile',
            'user' => $user
        ];

        $this->view('users/edit', $data);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['name'] = strip_tags($_POST['name']);
            $_POST['email'] = strip_tags($_POST['email']);
            $_POST['phone'] = strip_tags($_POST['phone']);

            $data = [
                'id' => $_SESSION['user_id'],
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'name_err' => '',
                'email_err' => '',
                'phone_err' => ''
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } elseif ($this->userModel->findUserByEmail($data['email']) && $this->userModel->getUserById($data['id'])->email != $data['email']) {
                $data['email_err'] = 'Email is already taken';
            }

            // Additional validation can be added here

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['phone_err'])) {
                if ($this->userModel->update($data)) {
                    header('Location: ' . URLROOT . '/users/profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('users/edit', $data);
            }
        } else {
            header('Location: ' . URLROOT . '/users/edit');
        }
    }

    public function delete()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . URLROOT . '/users/login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->deleteUser($_SESSION['user_id'])) {
                unset($_SESSION['user_id']);
                session_destroy();
                header('Location: ' . URLROOT . '/users/login');
            } else {
                die('Something went wrong');
            }
        } else {
            header('Location: ' . URLROOT . '/users/profile');
        }
    }
}
