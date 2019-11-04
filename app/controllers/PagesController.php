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

        $this->view('pages/index', $data);
    }

    public function users(): void
    {
        $data = array(
            'title'               => 'Users',
            'content_title'       => 'COGIP: Users directory',
            'content_description' => 'Bonjour !',
        );

        $this->view('pages/users', $data);
    }

    public function invoices(): void
    {
        $data = array(
            'title'               => 'Invoices',
            'content_title'       => 'COGIP: List of invoices',
            'content_description' => 'Bonjour !',
        );

        $this->view('pages/invoices', $data);
    }

    public function companies(): void
    {
        $data = array(
            'title'               => 'Companies',
            'content_title'       => 'COGIP: Companies directory',
            'content_description' => 'Bonjour !',
        );

        $this->view('pages/companies', $data);
    }
}
