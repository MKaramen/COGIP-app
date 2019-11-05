<?php

declare(strict_types=1);


/*
 * Pages Controller class (loads models and views: home, users, invoices,companies)
 */
class PagesController extends Controller
{
    private $currentModel;

    public function __construct()
    {
        $this->currentModel = $this->model('PagesModel');
    }

    public function index(): void
    {
        $data = array(
            'title'               => 'Home',
            'content_title'       => 'Welcome to the COGIP',
            'content_description' => 'Bonjour !',
        );

        $dataModel = $this->currentModel->index();
        $data = array_merge($data, $dataModel);
        $this->view('pages/index', $data, $dataModel);
    }

    public function users(): void
    {
        $data = array(
            'title'               => 'Users',
            'content_title'       => 'COGIP: Users directory',
            'content_description' => 'Bonjour !',
        );
        $dataModel = $this->currentModel->users();
        $this->view('pages/users', $data, $dataModel);
    }

    public function invoices(): void
    {
        $data = array(
            'title'               => 'Invoices',
            'content_title'       => 'COGIP: List of invoices',
            'content_description' => 'Bonjour !',
        );
        $dataModel = $this->currentModel->invoices();
        $this->view('pages/invoices', $data, $dataModel);
    }

    public function companies(): void
    {
        $data = array(
            'title'               => 'Companies',
            'content_title'       => 'COGIP: Companies directory',
            'content_description' => 'Bonjour !',
        );

        $dataModel = $this->currentModel->companies();
        $this->view('pages/companies', $data, $dataModel);
    }
}
