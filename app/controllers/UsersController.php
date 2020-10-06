<?php
include_once APPROOT  . '/helpers/url_helper.php';
include_once APPROOT . '/helpers/session_helper.php';

class UsersController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = $this->model('User');
    }

    public function index($id = null)
    {
        if (isset($id)) {
        }
    }
    public function profile()
    {

        if (isset($_SESSION['user_id'])) {
            $user = $this->users->findFromEmail($_SESSION['email']);
            $data = [
                'username' => $user['name'],
                'email' => $user['email'],
                'password' => '*******',
            ];
        }
        $this->view('pages/profile', $data);
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'pass' => trim($_POST['pass']),
                'confirm_pass' => trim($_POST['confirm_pass']),
                'name_err' => '',
                'email_err' => '',
                'pass_err' => '',
                'confirm_pass_err' => ''

            ];


            // Validation State
            if (empty($data['name'])) {
                $data['name_err'] = '<p class="alert alert-danger">Please fill the blanks</p>';
            }
            if (empty($data['email'])) {
                $data['email_err'] = '<p class="alert alert-danger">Please fill the blanks</p>';
            } else {
                $result = $this->users->findFromEmail($_POST['email']);
                if (!empty($result)) {
                    $data['email_err'] = '<p class="alert alert-danger">Email already taken</p>';
                }
            }

            if (empty($data['pass'])) {
                $data['pass_err'] = '<p class="alert alert-danger">Please fill the blanks</p>';
            } elseif (strlen($data['pass']) < 7) {
                $data['pass_err'] = '<p class="alert alert-danger">Password must be at least 7 characters.</p>';
            }

            if (empty($data['confirm_pass'])) {
                $data['confirm_pass_err'] = '<p class="alert alert-danger">Please fill the blanks</p>';
            } else {
                if ($data['pass'] != $data['confirm_pass']) {
                    $data['confirm_pass_err'] = '<p class="alert alert-danger">Passwords do not match</p>';
                }
            }

            if (empty($data['name_err']) && empty($data['pass_err']) && empty($data['email_err']) && empty($data['confirm_pass_err'])) {
                $params = [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => password_hash($data['pass'], PASSWORD_DEFAULT),
                    'paid_user' => 0
                ];
                $this->users->addUser($params);
                $msg = success_message('register');
                $_SESSION['register'] = $msg;
                redirect('/users/login');
            } else {
                $this->view('pages/register', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'pass' => '',
                'confirm_pass' => '',
                'name_err' => '',
                'email_err' => '',
                'pass_err' => '',
                'confirm_pass_err' => ''

            ];
            $this->view('pages/register', $data);
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'pass' => trim($_POST['pass']),
                'email_err' => '',
                'pass_err' => '',
            ];
            if (empty($data['email'])) {
                $data['email_err'] = '<p class="alert alert-danger">Please fill the blanks</p>';
            }

            if (empty($this->users->findFromEmail($data['email']))) {
                $data['email_err'] = '<p class="alert alert-danger">Email is not registered</p>';
            }


            if (empty($this->users->findUser))
                if (empty($data['pass'])) {
                    $data['pass_err'] = '<p class="alert alert-danger">Please fill the blanks</p>';
                }

            if (empty($data['email_err']) && empty($data['pass_err'])) {
                $loggedIn = $this->users->login($data['email'], $data['pass']);
                if ($loggedIn) {
                    createUserSession($loggedIn);
                    redirect('/pages/index');
                } else {
                    $data['pass_err'] = '<p class="alert alert-danger">The password is incorrect</p>';
                }
            } else {
                $this->view('pages/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'pass' => '',
                'email_err' => '',
                'pass_err' => '',

            ];
        }
        $this->view('pages/login', $data);
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        session_destroy();
        redirect('/index');
    }
}
