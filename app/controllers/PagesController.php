<?php declare(strict_types=1);


/**
 * Pages Controller class (loads models and views: home, users, invoices, companies...)
 */
class PagesController extends Controller
{
    private $currentModel;

    public function __construct(){$this->currentModel = $this->model('PagesModel'); }

    public function index(): void
    {
        $dataInfo = array(
            'title'               => 'Home',
            'content_title'       => 'Welcome to the COGIP', 
            'content_description' => 'Hi!',
        );
        $dataModel = $this->currentModel->index();
        $this->view('pages/index', $dataInfo, $dataModel);
    }

    public function users(): void
    {
        $dataInfo = array(
            'title'               => 'Users',
            'content_title'       => 'COGIP: Users directory', 
            'content_description' => '',
        );
        $dataModel = $this->currentModel->users();
        $this->view('pages/users', $dataInfo, $dataModel);
    }

    public function invoices(): void
    {
        $dataInfo = array(
            'title'               => 'Invoices',
            'content_title'       => 'COGIP: List of invoices', 
            'content_description' => '',
        );
        $dataModel = $this->currentModel->invoices();
        $this->view('pages/invoices', $dataInfo, $dataModel);
    }

    public function companies(): void
    {
        $dataInfo = array(
            'title'               => 'Companies',
            'content_title'       => 'COGIP: Companies directory', 
            'content_description' => '',
        );
        $dataModel = $this->currentModel->companies();
        $this->view('pages/companies', $dataInfo, $dataModel);
    }

    /**
     * Methods use for all the detail page  
    */
    public function user(): void
    {
        // Add name user to the title + in the content title 
        $dataInfo = array(
            'title'               => 'User',
            'content_title'       => 'User',
            'content_description' => '',
            'table_title-first'   => 'User Informations',
            'table_title-second'  => 'Related Invoice',
        );
        $dataModel = $this->currentModel->user();
        $this->view('pages/user', $dataInfo, $dataModel);
    }

    public function invoice(): void
    {
        $dataInfo = array(
            'title'               => 'Invoice',
            'content_title'       => 'Invoice',
            'content_description' => '',
            'table_title-first'   => 'Company linked to the invoice',
            'table_title-second'  => 'Contact Person',
        );
        $dataModel = $this->currentModel->invoice();
        $this->view('pages/invoice', $dataInfo, $dataModel);
    }

    public function company(): void
    {
        // Add company name etc
        $dataInfo = array(
            'title'               => 'Company',
            'content_title'       => 'Company',
            'content_description' => '',
            'table_title-first'   => 'Contact Persons',
            'table_title-second'  => 'Invoices',
        );
        $dataModel = $this->currentModel->company();
        $this->view('pages/company', $dataInfo, $dataModel);
    }
}