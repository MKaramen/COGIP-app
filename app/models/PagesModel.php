<?php

declare(strict_types=1);


/*
 * Pages model class
 */
class PagesModel extends Model
{
    /*
        Create  predefined request for each page in order to get the data for all the tables  
    */
    public function index(): array
    {
        // Request for First table - WORKS 
        $request_firstTable = 'SELECT invoice_number, invoice_date, company.company_name FROM invoice INNER JOIN company ON invoice_fk_company = company.id ORDER BY invoice_date';
        $result_firstTable = $this->getData($request_firstTable);
        $result_global['last_invoice']['rows'] = $result_firstTable;
        $result_global['last_invoice']['columns'] = array("Invoice Number", "Date", "Comapny");
        // Helper::dump($result_firstTable);

        // Request for double table - WORKS 
        $request_secondTable = 'SELECT people_fullName, people_email, people_phone, people_company FROM people';
        $result_secondTable = $this->getData($request_secondTable);
        $result_global['last_contact'] = $result_secondTable;
        // Helper::dump($result_secondTable);

        // Request Third table - WORKS 
        $request_thirdTable = 'SELECT company_name, company_tva, company_country, type.type FROM company INNER JOIN type ON company.company_fk_type = type.id ';
        $result_thirdTable = $this->getData($request_thirdTable);
        $result_global['last_company'] = $result_thirdTable;
        // Helper::dump($result_thirdTable);


        //Return le resultat gloabl 
        // Helper::dump($result_global);
        return $result_global;
    }

    public function users(): array
    {
        $request = 'SELECT people_fullName, people_email, people_phone, people_company FROM people';
        $result = $this->getData($request);
        $result_global['users']['row'] = $result;
        $result_global['users']['col'] = array("Id", "Name", "Email", "Phone Number", 'Company');
        // Helper::dump($result);
        return $result_global;
    }

    public function invoices(): array
    {
        $request = 'SELECT invoice_number, invoice_date, company_name, type.type FROM invoice INNER JOIN company ON invoice_fk_company = company.id INNER JOIN type ON company.company_fk_type = type.id';
        $result = $this->getData($request);
        $result_global['invoices']['row'] = $result;
        $result_global['invoices']['col'] = array("Id", "Invoice Number", "Date", "Company", "Type");
        return $result_global;
    }

    public function companies(): array
    {
        // Clients
        $request_client = 'SELECT company_name, company_tva, company_country FROM company WHERE company_fk_type=2;';
        $result_client = $this->getData($request_client);
        // $resultat_global['client']['row'] = $result_client;
        $result_global['clients']['row'] = $result_client;
        $result_global['clients']['col'] = array("Id", "Company", "TVA number", "Country");
        // return $result_global;

        // Supplier
        $request_supplier = 'SELECT company_name, company_tva, company_country FROM company WHERE company_fk_type=1;';
        $result_supplier = $this->getData($request_supplier);
        $result_global['supplier']['row'] = $result_supplier;
        $result_global['supplier']['col'] = array("Id", "Company", "TVA number", "Country");

        return $result_global;
    }
}
