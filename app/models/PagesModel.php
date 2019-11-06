<?php

declare(strict_types=1);


/*
 * Pages model class
 */
class PagesModel extends Model
{
    public function index(): array
    {
        // Last users (5 records)
        $sql = <<<SQL
        SELECT tb_p.people_fullName, tb_p.people_phone, tb_p.people_email, tb_p.people_company 
        FROM `people` AS tb_p
        LIMIT 5
        SQL;

        $out['last_users']['rows'] = $this->select($sql);
        $out['last_users']['cols'] = array('Nbr', 'Name', 'Phone', 'Email', 'Company');

        // Last companies (5 records)
        $sql = <<<SQL
        SELECT tb_c.company_name, tb_c.company_tva, tb_c.company_country, tb_t.type
        FROM `company` AS tb_c
        INNER JOIN `type` AS tb_t
        ON tb_c.company_fk_type = tb_t.type
        LIMIT 5
        SQL;

        $out['last_companies']['rows'] = $this->select($sql);
        $out['last_companies']['cols'] = array('Nbr', 'Name', 'TVA', 'Country', 'Type');

        // Last invoices (5 records)
        $sql = <<<SQL
        SELECT tb_i.invoice_number, tb_i.invoice_date, tb_c.company_name
        FROM `invoice` AS tb_i
        INNER JOIN `company` AS tb_c
        ON tb_i.invoice_fk_company = tb_c.id
        LIMIT 5
        SQL;

        $out['last_invoices']['rows'] = $this->select($sql);
        $out['last_invoices']['cols'] = array('Nbr', 'Invoice Number', 'Dates', 'Company');

        return $out;
    }

    public function users(): array
    {
        $sql = <<<SQL
        SELECT tb_p.people_fullName, tb_p.people_phone, tb_p.people_email, tb_p.people_company 
        FROM `people` AS tb_p
        SQL;

        $out['users']['rows'] = $this->select($sql);
        $out['users']['cols'] = array('Nbr', 'Name', 'Phone', 'Email', 'Company');

        return $out;
    }

    public function invoices(): array
    {
        $sql = <<<SQL
        SELECT tb_i.invoice_number, tb_i.invoice_date, tb_c.company_name, tb_t.type 
        FROM `invoice` AS tb_i
        INNER JOIN `company` AS tb_c
        ON tb_i.invoice_fk_company = tb_c.id 
        INNER JOIN `type` AS tb_t 
        ON tb_c.company_fk_type = tb_t.id;
        SQL;

        $out['invoices']['rows'] = $this->select($sql);
        $out['invoices']['cols'] = array('Nbr', 'Invoice Number', 'Dates', 'Company', 'Type');

        return $out;
    }

    public function companies()
    {
        // Clients
        $sql = <<<SQL
        SELECT tb_c.company_name, tb_c.company_tva, tb_c.company_country 
        FROM `company` AS tb_c
        WHERE tb_c.company_fk_type=2;
        SQL;

        $out['clients']['rows'] = $this->select($sql);
        $out['clients']['cols'] = array('Nbr', 'Name', 'TVA', 'Country');

        // Suppliers
        $sql = <<<SQL
        SELECT tb_c.company_name, tb_c.company_tva, tb_c.company_country 
        FROM `company` AS tb_c
        WHERE tb_c.company_fk_type=1;
        SQL;

        $out['suppliers']['rows'] = $this->select($sql);
        $out['suppliers']['cols'] = array('Nbr', 'Name', 'TVA', 'Country');

        return $out;
    }
}