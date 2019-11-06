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

    public function login(): void
    {
        $dataInfo = array(
            'title'               => 'Login',
            'content_title'       => 'Welcome to the COGIP', 
            'content_description' => 'Please log in to start your session.',
        );

        $dataModel = [];
        //$dataModel = $this->currentModel->login();

        $this->view('admin/login', $dataInfo, $dataModel);
    }

    public function reset(): void
    {
        $dataInfo = array(
            'title'               => 'Reset',
            'content_title'       => 'Reset password', 
            'content_description' => 'Please type your email and clik to change or reset your password.',
        );

        $dataModel = [];
        //$dataModel = $this->currentModel->reset();

        $this->view('admin/reset', $dataInfo, $dataModel);
    }

    public function dashboard(): void
    {
        $dataInfo = array(
            'title'               => 'Dashboard',
            'content_title'       => 'Dashboard', 
            'content_description' => "Bonjour Jean-Christian ! Que souhaiteriez-vous faire aujourd'hui ?",
        );

        $dataModel = [];
        //$dataModel = $this->currentModel->dashboard();

        $this->view('admin/dashboard', $dataInfo, $dataModel);
    }

    public function new_user(): void
    {
        $dataInfo = array(
            'title'               => 'New user',
            'content_title'       => 'Create new user', 
            'content_description' => '',
        );

        $dataModel = [];
        //$dataModel = $this->currentModel->new_user();

        $this->view('admin/dashboard', $dataInfo, $dataModel);
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

        $this->view('admin/dashboard', $dataInfo, $dataModel);
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

        $this->view('admin/dashboard', $dataInfo, $dataModel);
    }
}