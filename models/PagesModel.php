<?php declare(strict_types=1);


/*
 * Pages model class
 */
class PagesModel extends Database
{
    public function index(): array
    {

        // LAST USERS (5 records) - WORKS 
        $sql = "SELECT CONCAT(people_firstname, ' ', people_lastname) AS people_fullName, people_phone, people_email, people_company 
                FROM `people`
                ORDER BY people_date DESC
                LIMIT 5";
        $out['last_user']['cols'] = array('#', 'Name', 'Phone', 'Email', 'Company');
        $out['last_user']['rows'] = $this->getData($sql, true);
        
        // LAST COMPANIES (5 records) - WORKS 
        $sql = "SELECT tb_c.company_name, tb_c.company_tva, tb_c.company_country, tb_t.type
                FROM `company` AS tb_c
                INNER JOIN `type` AS tb_t
                ON tb_c.company_fk_type = tb_t.type
                ORDER BY tb_c.company_date DESC
                LIMIT 5";
        $out['last_company']['cols'] = array('#', 'Company', 'TVA', 'Country', 'Type');
        $out['last_company']['rows'] = $this->getData($sql, true);

        // LAST INVOICES (5 records) - WORKS 
        $sql = "SELECT tb_i.invoice_number, tb_i.invoice_date, tb_c.company_name
                FROM `invoice` AS tb_i
                INNER JOIN `company` AS tb_c
                ON tb_i.invoice_fk_company = tb_c.id
                ORDER BY tb_i.invoice_date DESC
                LIMIT 5";
        $out['last_invoice']['cols'] = array('#', 'Invoice Number', 'Date', 'Company');
        $out['last_invoice']['rows'] = $this->getData($sql, true);

        return $out;
    }

    public function users(): array
    {
        $sql = "SELECT CONCAT(people_firstname, ' ', people_lastname) AS people_fullName, people_phone, people_email, people_company 
                FROM `people`
                ORDER BY people_fullName";
        $out['users']['cols'] = array('#', 'Name', 'Phone', 'Email', 'Company');
        $out['users']['rows'] = $this->getData($sql, true);

        return $out;
    }

    public function invoices(): array
    {
        $sql = "SELECT tb_i.invoice_number, tb_i.invoice_date, tb_c.company_name, tb_t.type 
                FROM `invoice` AS tb_i
                INNER JOIN `company` AS tb_c
                ON tb_i.invoice_fk_company = tb_c.id 
                INNER JOIN `type` AS tb_t 
                ON tb_c.company_fk_type = tb_t.id";
        $out['invoices']['cols'] = array('#', 'Name', 'Phone', 'Email', 'Company');
        $out['invoices']['rows'] = $this->getData($sql, true);

        return $out;
    }

    public function companies()
    {

        // CLIENTS
        $sql = "SELECT company_name, company_tva, company_country 
                FROM `company` 
                WHERE company_fk_type=2 
                ORDER BY company_name";
        $out['clients']['cols'] = array('#', 'Company', 'TVA number', 'Country');
        $out['clients']['rows'] = $this->getData($sql, true);

        // SUPPLIERS
        $sql = "SELECT company_name, company_tva, company_country 
                FROM `company` 
                WHERE company_fk_type=1 
                ORDER BY company_name";
        $out['suppliers']['cols'] = array('#', 'Company', 'TVA number', 'Country');
        $out['suppliers']['rows'] = $this->getData($sql, true);

        return $out;
    }

    /**
     * Function for all the single page 
    */
    public function user(): array
    {
        // ADD WHERE ID = PEOPLE.ID  
        // First Table - Get all data from the user 
        $sql = "SELECT CONCAT(people_firstname, ' ', people_lastname) AS people_fullName, people_phone, people_email, tb_c.company_name 
                FROM `people` AS tb_p
                INNER JOIN `people_has_company` AS tb_pc 
                ON tb_p.id = tb_pc.fk_people 
                INNER JOIN `company` AS tb_c 
                ON tb_pc.fk_company = tb_c.id";
        $out['user_info']['cols'] = array('#', 'Name', 'Phone', 'Email', 'Company');
        $out['user_info']['rows'] = $this->getData($sql, true);

        // Second table - Get all the invoices related to the user 
        // ADD WHERE ID = PEOPLE.id 
        $sql= "SELECT tb_i.invoice_number, tb_i.invoice_date 
               FROM `people`  AS tb_p
               INNER JOIN `invoice` AS tb_i
               ON tb_p.id = tb_i.invoice_fk_people";
        $out['user_invoices']['cols'] = array('#', 'Invoice Number', 'Date');
        $out['user_invoices']['rows'] = $this->getData($sql, true);

        return $out;
    }

    public function invoice(): array
    {
        // First table - Company linked to the invoice 
        // ADD : WHERE ID = INVOICE.ID
        $sql = "SELECT company.company_name, company.company_tva, tb_t.type 
                FROM `invoice` 
                INNER JOIN `company` 
                ON invoice_fk_company = company.id 
                INNER JOIN `type` AS tb_t
                ON company.company_fk_type = tb_t.id";
        $out['invoice_linkedCompany']['cols'] = array('Id', 'Name', 'TVA', "Type");
        $out['invoice_linkedCompany']['rows'] = $this->getData($sql, true);

        // Second table - Contact person
        // ADD : WHERE ID = INVOICE.ID
        $sql = "SELECT CONCAT(people_firstname, ' ', people_lastname) AS people_fullName, 
                    people.people_phone, people.people_email, people.people_company 
                FROM `invoice` 
                INNER JOIN `company` 
                ON invoice_fk_company = company.id 
                INNER JOIN `people_has_company` 
                ON company.id = people_has_company.fk_company 
                INNER JOIN `people` 
                ON people_has_company.fk_people = people.id";
        $out['invoice_contactPerson']['cols'] = array('#', 'Name', 'Phone', 'Email', 'Company');
        $out['invoice_contactPerson']['rows'] = $this->getData($sql, true);

        return $out;
    }

    public function company(): array
    {
        // First table - Show all the people in the company
        // ADD : WHERE ID = COMPANY.ID
        $sql = "SELECT CONCAT(people_firstname, ' ', people_lastname) AS people_fullName, 
                    people.people_phone, people.people_email, people.people_company 
                FROM `company`
                INNER JOIN `people_has_company`
                ON company.id = people_has_company.fk_company 
                INNER JOIN people ON people.id = people_has_company.fk_people";
        $out['company_people']['cols'] = array("#", "Name", "Phone", "Email", 'Company');
        $out['company_people']['rows'] = $this->getData($sql, true);

        // Second Table - Show all the invoices related to the company
        // ADD : WHERE ID = COMPANY.ID
        $sql = "SELECT invoice.invoice_number, invoice.invoice_date, CONCAT(people_firstname, ' ', people_lastname) AS people_fullName 
                FROM `company`
                INNER JOIN `invoice` 
                ON invoice.invoice_fk_company = company.id 
                INNER JOIN `people` 
                ON invoice.invoice_fk_people = people.id";
        $out['company_invoice']['cols'] = array('#', 'Invoice Number', 'Date', 'Name');
        $out['company_invoice']['rows'] = $this->getData($sql, true);

        return $out;
    }
}