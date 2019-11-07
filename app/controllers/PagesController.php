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
        // $data = array_merge($data, $dataModel);
        $this->view('pages/index', $data, $dataModel);
    }

    public function users(): void
    {
        $data = array(
            'title'               => 'Users',
            'content_title'       => 'COGIP: Users directory',
            'content_description' => '',
        );
        $dataModel = $this->currentModel->users();
        $this->view('pages/users', $data, $dataModel);
    }

    public function invoices(): void
    {
        $data = array(
            'title'               => 'Invoices',
            'content_title'       => 'COGIP: List of invoices',
            'content_description' => '',
        );
        $dataModel = $this->currentModel->invoices();
        $this->view('pages/invoices', $data, $dataModel);
    }

    public function companies(): void
    {
        $data = array(
            'title'               => 'Companies',
            'content_title'       => 'COGIP: Companies directory',
            'content_description' => '',
        );

        $dataModel = $this->currentModel->companies();
        $this->view('pages/companies', $data, $dataModel);
    }

    /* 
        Function use for all the detail page  
    */
    public function company(): void
    {
        /* add company name etc*/
        $data = array(
            'title'              => 'Company',
            'content_title'       => 'Company',
            'content_description' => '',
            'firsth3' => 'Contact Persons',
            'secondh3' => 'Factures'
        );

        $dataModel = $this->currentModel->company();
        // $data = array_merge($data, $dataModel);
        $this->view('pages/company', $data, $dataModel);
    }

    public function user(): void
    {
        // Add name user to the title + in the content title 
        $data = array(
            'title'               => 'User',
            'content_title'       => 'User',
            'content_description' => '',
            'firsth3' => 'User Informations',
            'secondh3' => 'Related Invoice'
        );

        $dataModel = $this->currentModel->user();
        // $data = array_merge($data, $dataModel);
        $this->view('pages/user', $data, $dataModel);
    }

    public function invoice(): void
    {
        $data = array(
            'title'               => 'Invoice',
            'content_title'       => 'Invoice',
            'content_description' => '',
            'firsth3' => 'Company linked to the invoice',
            'secondh3' => 'Contact Person'
        );

        $dataModel = $this->currentModel->invoice();
        // $data = array_merge($data, $dataModel);
        $this->view('pages/invoice', $data, $dataModel);
    }
}
