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
        // Request for First table - INVOICE - WORKS 
        $request_firstTable = 'SELECT invoice.id, invoice_number, invoice_date, company.company_name FROM invoice INNER JOIN company ON invoice_fk_company = company.id ORDER BY invoice_date LIMIT 5';
        $result_firstTable = $this->getData($request_firstTable);
        $result_global['last_invoice']['row'] = $result_firstTable;
        $result_global['last_invoice']['col'] = array("Id", "Invoice Number", "Date", "Company");
        // Helper::dump($result_firstTable);

        // Request for double table - PEOPLE - WORKS 
        $request_secondTable = 'SELECT people.id, people_fullName, people_email, people_phone, people_company FROM people LIMIT 5';
        $result_secondTable = $this->getData($request_secondTable);
        $result_global['last_contact']['row'] = $result_secondTable;
        $result_global['last_contact']['col'] = array("Id", "Name", "Email", "Phone", "Company");
        // Helper::dump($result_secondTable);

        // Request Third table - COMPANY - WORKS 
        $request_thirdTable = 'SELECT company.id, company_name, company_tva, company_country, type.type FROM company INNER JOIN type ON company.company_fk_type = type.id LIMIT 5';
        $result_thirdTable = $this->getData($request_thirdTable);
        $result_global['last_company']['row'] = $result_thirdTable;
        $result_global['last_company']['col'] = array("Id", "Company", "TVA", "Country", "Type");
        // Helper::dump($result_thirdTable);


        //Return le resultat gloabl 
        // Helper::dump($result_global);
        return $result_global;
    }

    public function users(): array
    {
        $request = 'SELECT people.id, people_fullName, people_email, people_phone, people_company FROM people';
        $result = $this->getData($request);
        $result_global['users']['row'] = $result;
        $result_global['users']['col'] = array("Id", "Name", "Email", "Phone Number", 'Company');
        // Helper::dump($result);
        return $result_global;
    }

    public function invoices(): array
    {
        $request = 'SELECT invoice.id, invoice_number, invoice_date, company_name, type.type FROM invoice INNER JOIN company ON invoice_fk_company = company.id INNER JOIN type ON company.company_fk_type = type.id';
        $result = $this->getData($request);
        $result_global['invoices']['row'] = $result;
        $result_global['invoices']['col'] = array("Id", "Invoice Number", "Date", "Company", "Type");
        return $result_global;
    }

    public function companies(): array
    {
        // Clients
        $request_client = 'SELECT company.id, company_name, company_tva, company_country FROM company WHERE company_fk_type=2 ORDER BY company_name;';
        $result_client = $this->getData($request_client);
        // $resultat_global['client']['row'] = $result_client;
        $result_global['clients']['row'] = $result_client;
        $result_global['clients']['col'] = array("Id", "Company", "TVA number", "Country");
        // return $result_global;

        // Supplier
        $request_supplier = 'SELECT company.id, company_name, company_tva, company_country FROM company WHERE company_fk_type=1 ORDER BY company_name;';
        $result_supplier = $this->getData($request_supplier);
        $result_global['supplier']['row'] = $result_supplier;
        $result_global['supplier']['col'] = array("Id", "Company", "TVA number", "Country");

        return $result_global;
    }

    /* 
    Function for all the single page 
    */
    public function user(): array
    {
        // ADD WHERE ID = PEOPLE.ID  
        // First Table - Get all data from the user 
        $request = 'SELECT people_fullName, people_email, people_phone, company.company_name FROM people INNER JOIN people_has_company ON people.id = people_has_company.fk_people INNER JOIN company ON people_has_company.fk_company = company.id';
        $result = $this->getData($request);
        $result_global['user_info']['row'] = $result;
        $result_global['user_info']['col'] = array("Id", "Name", "Email", "Phone Number", 'Company');


        // Second table - Get all the invoices related to the user 
        // ADD WHERE ID = PEOPLE.id 
        $request = 'SELECT invoice.invoice_number, invoice.invoice_date FROM people
        INNER JOIN invoice ON people.id = invoice.invoice_fk_people';
        $result = $this->getData($request);
        $result_global['user_invoices']['row'] = $result;
        $result_global['user_invoices']['col'] = array("id", "Invoice Number", "Date");
        return $result_global;
    }

    public function invoice(): array
    {
        // First table - Company linked to the invoice 
        // ADD : WHERE ID = INVOICE.ID
        $request = 'SELECT company.company_name, company.company_tva, type.type FROM invoice INNER JOIN company ON invoice_fk_company = company.id INNER JOIN type ON company.company_fk_type = type.id';
        $result = $this->getData($request);
        $result_global['invoice_linkedCompany']['row'] = $result;
        $result_global['invoice_linkedCompany']['col'] = array("Id", "Company Name", "TVA number", "Company Type");
        // Helper::dump($result);


        //Second table - Contact person
        // ADD : WHERE ID = INVOICE.ID
        $request = 'SELECT people.people_fullName, people.people_email, people.people_phone, people.people_company FROM invoice INNER JOIN company ON invoice_fk_company = company.id INNER JOIN people_has_company ON company.id = people_has_company.fk_company INNER JOIN people ON people_has_company.fk_people = people.id';
        $result = $this->getData($request);
        $result_global['invoice_contactPerson']['row'] = $result;
        $result_global['invoice_contactPerson']['col'] = array("Id", "Name", "Email", "Phone Number", 'Company');
        return $result_global;
    }

    public function company(): array
    {
        // First table - Show all the people in the company
        //ADD : WHERE ID = COMPANY.ID
        $request = 'SELECT people.people_fullName, people.people_email, people.people_phone, people.people_company FROM company INNER JOIN people_has_company ON company.id = people_has_company.fk_company INNER JOIN people ON people.id = people_has_company.fk_people';
        $result = $this->getData($request);
        $result_global['company_people']['row'] = $result;
        $result_global['company_people']['col'] = array("Id", "Name", "Email", "Phone Number", 'Company');

        // Second Table - Show all the invoices related to the company
        //ADD : WHERE ID = COMPANY.ID
        $request = 'SELECT invoice.invoice_number, invoice.invoice_date, people.people_fullName FROM company INNER JOIN invoice ON invoice.invoice_fk_company = company.id INNER JOIN people ON invoice.invoice_fk_people = people.id';
        $result = $this->getData($request);
        $result_global['company_invoice']['row'] = $result;
        $result_global['company_invoice']['col'] = array("Id", "Invoice Number", "Date", "Contact Person");
        // Helper::dump($result);
        return $result_global;
    }
}
