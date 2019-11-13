<?php declare(strict_types=1);


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

        // Login form processing
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {   // POST request (login form)

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
            
            if (empty($loggedInUser))
            {
                // Load View with errors
                $dataModel['login_error'] = 'These credentials do not match our records';
                $this->view('admin/login', $dataInfo, $dataModel);
            }
            elseif ($loggedInUser['people_access'] == 'user') 
            {
                // Load View with errors
                $dataModel['login_error'] = 'Forbidden access for this type of user';
                $this->view('admin/login', $dataInfo, $dataModel);
            }
            else Session::createUser($loggedInUser); // Create session variable
        }
        else 
        {  // No POST request (default values)
            $dataModel = array(
                'login_username' => '',
                'login_password' => '',
                'login_error'    => ($expired=='yes') ? 'Your session has expired. Please log in again' : '',
            );

            // Load view with default values
            $this->view('/admin/login', $dataInfo, $dataModel);
        }
    }

    /* */
    public function logout(): void {Session::logout();}

    public function delete(array $args): void
    {
        if (isset($args)) {
            $id = $args[0];
             
        }
    }

    /* */
    public function dashboard(): void
    {
        $username = $_SESSION['firstname'] ?? '';

        $dataInfo = array(
            'title'               => 'Dashboard',
            'content_title'       => 'Dashboard', 
            'content_description' => 'Hi '. $username . '! What would you like to do today?',
        );
        $dataModel = $this->currentModel->dashboard();
        $this->view('admin/dashboard', $dataInfo, $dataModel);
    }

    public function new_user(array $args): void
    {
        $id = $args ? $args[0] : '0'; 
        $id = intval(filter_var(trim($id), FILTER_SANITIZE_NUMBER_INT)); 
        $dataInfo = array(
            'title'               => 'New user',
            'content_title'       => 'Create new user', 
            'content_description' => 'Please fill in your credentials to create a free account',
        );

        // New user form processing
        if($_SERVER['REQUEST_METHOD'] == 'POST') {   
            // POST request (login form) 
            $post = array(
                'people_lastname'  => filter_var(trim($_POST['user_lastname']), FILTER_SANITIZE_STRING),
                'people_firstname' => filter_var(trim($_POST['user_firstname']), FILTER_SANITIZE_STRING),
                'people_phone'     => $_POST['user_phone'],
                'people_email'     => $_POST['user_email'],
                'people_password'  => password_hash($_POST['user_password'], PASSWORD_DEFAULT),
                'people_company'   => filter_var(trim($_POST['user_company']), FILTER_SANITIZE_STRING),
                'people_date'      => $_POST['user_date'],
                'people_access'    => $_POST['user_access'],
            );
            $this->currentModel->update('people', $post, $id, $post['people_access']);
            Helper::to('/admin/dashboard');
        }
        else {
            // No POST request (default values)
            if ($id) {
                // Edit values
                $user = $this->currentModel->new_user($id);
                $dataModel = array(
                    'lastname'   => $user['people_lastname'],
                    'firstname'  => $user['people_firstname'],
                    'phone'      => $user['people_phone'],
                    'email'      => $user['people_email'],
                    'password'   => $user['people_password'],
                    'company'    => $user['people_company'],
                    'date'       => implode('T', explode(' ', $user['people_date'])),
                    'access'     => $user['people_access'],
                    'companies' => $this->currentModel->getCompanies(),
                );
            }
            else {
                // No edit values
                $dataModel = array(
                    'lastname'  => '',
                    'firstname' => '',
                    'phone'     => '',
                    'email'     => '',
                    'password'  => '',
                    'company'   => '',
                    'date'      => date('Y-m-d H:i:s'),
                    'access'    => 'User',
                    'companies' => $this->currentModel->getCompanies(),
                );
            }

            // Load view with edit values
            $this->view('admin/new_user', $dataInfo, $dataModel);
        }
    }

    public function new_invoice(): void
    {
        $dataInfo = array(
            'title'               => 'New invoice',
            'content_title'       => 'Create new invoice', 
            'content_description' => '',
        );
        $dataModel = [];

        // New invoice form processing
        if($_SERVER['REQUEST_METHOD'] == 'POST') {   
            // POST request (login form) 
        }
        else {
            // No POST request (default values)
            //$dataModel = $this->currentModel->new_invoice();

            // Load view with edit values
            $this->view('admin/new_user', $dataInfo, $dataModel);
        }
    }

    public function new_company(): void
    {
        $dataInfo = array(
            'title'               => 'New company',
            'content_title'       => 'Create new company', 
            'content_description' => '',
        );
        $dataModel = [];

        // New company form processing
        if($_SERVER['REQUEST_METHOD'] == 'POST') {   
            // POST request (login form) 
        }
        else {
            // No POST request (default values)
            //$dataModel = $this->currentModel->new_company();

            // Load view with edit values
            $this->view('admin/new_user', $dataInfo, $dataModel);
        }
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