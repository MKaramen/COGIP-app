<?php

declare(strict_types=1);
/*
 * Admin Controller class (loads models and views: admin, login, logout)
 */
class AdminController extends Controller
{
    private $currentModel;
    public function __construct()
    {
        $this->currentModel = $this->model('AdminModel');
    }
    public function login(array $args): void
    {
        $expired = $args ? $args[0] : '';
        $dataInfo = array(
            'title'               => 'Login',
            'content_title'       => 'Welcome to the COGIP',
            'content_description' => 'Please log in to start your session.',
        );
        // Login form proessing
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {   // POST request (login form)
            // Sanitize $_POST data
            $dataModel = array(
                'login_username' =>
                filter_var(trim($_POST['login_username']), FILTER_SANITIZE_STRING),
                'login_password' =>
                filter_var(trim($_POST['login_password']), FILTER_SANITIZE_STRING),
                'login_error'    => '',
            );
            // Authenticating a user (username and password)
            $username = $dataModel['login_username'];
            $password = $dataModel['login_password'];
            $loggedInUser = $this->currentModel->login($username, $password);

            if (empty($loggedInUser)) {
                // Load View with errors
                $dataModel['login_error'] = 'These credentials do not match our records';
                $this->view('admin/login', $dataInfo, $dataModel);
            } elseif ($loggedInUser['people_access'] == 'user') {
                // Load View with errors
                $dataModel['login_error'] = 'Forbidden access for this type of user';
                $this->view('admin/login', $dataInfo, $dataModel);
            } else Session::createUser($loggedInUser); // Create session variable
        } else {  // No POST request (default values)
            $dataModel = array(
                'login_username' => '',
                'login_password' => '',
                'login_error'    => ($expired == 'yes') ? 'Your session has expired. Please log in again' : '',
            );
            // Load view with default values
            $this->view('/admin/login', $dataInfo, $dataModel);
        }
    }
    /* */
    public function logout(): void
    {
        Session::logout();
    }
    /* */
    public function dashboard(): void
    {
        $username = Helper::capitalize($_SESSION['firstname']);
        $dataInfo = array(
            'title'               => 'Dashboard',
            'content_title'       => 'Dashboard',
            'content_description' => 'Hi ' . $username . '! What would you like to do today?',
        );
        $dataModel = $this->currentModel->dashboard();
        $this->view('admin/dashboard', $dataInfo, $dataModel);
    }
    public function new_user(): void
    {
        $dataInfo = array(
            'title'               => 'New user',
            'content_title'       => 'Create new user',
            'content_description' => 'Please fill in your credentials to create a free account',
        );
        $dataModel = [];
        //$dataModel = $this->currentModel->new_user();
        $this->view('admin/new_user', $dataInfo, $dataModel);
    }
    public function new_invoice(): void
    {
        $dataInfo = array(
            'title'               => 'New invoice',
            'content_title'       => 'Create new invoice',
            'content_description' => '',
        );
        $dataModel = [];
        //$dataModel = $this->currentModel->new_invoice();
        $this->view('admin/new_invoice', $dataInfo, $dataModel);
    }
    public function new_company(): void
    {
        $dataInfo = array(
            'title'               => 'New company',
            'content_title'       => 'Create new company',
            'content_description' => '',
        );
        $dataModel = [];
        //$dataModel = $this->currentModel->new_company();
        $this->view('admin/new_company', $dataInfo, $dataModel);
    }
    public function reset_password(): void
    {
        $dataInfo = array(
            'title'               => 'Reset',
            'content_title'       => 'Reset password',
            'content_description' => 'Please type your email and clik to change or reset your password.',
        );
        $dataModel = [];
        //$dataModel = $this->currentModel->reset_password();
        $this->view('admin/reset_password', $dataInfo, $dataModel);
    }
}
