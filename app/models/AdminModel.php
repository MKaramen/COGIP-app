<?php declare(strict_types=1);


/*
 * Admin model class
 */
class AdminModel extends Database
{
    /* Check if the username (people_lastname) is in the database */
    public function isUserFound(string $username): bool
    {
        $this->connectDb();
        $userQuery = $this->db->prepare("SELECT * FROM people WHERE people_lastname=:people_lastname");
        $userQuery->execute(array('people_lastname' => $username));
        $this->closeDb();

        return boolval($userQuery->rowCount());
    }

    /* Check if user is logged in and returns user info  */
    public function login(string $username, string $password): array
    {
        $this->connectDb();
        $userQuery = $this->db->prepare("SELECT * FROM people WHERE people_lastname=:people_lastname");
        $userQuery->execute(array('people_lastname' => $username));
        $user = $userQuery->fetch();
        $passwordHashed = $user['people_password'] ? $user['people_password'] : ''; // prevent errors (if returns FALSE)
        $this->closeDb();

        return password_verify($password, $passwordHashed) ? $user : array();
    }

    public function dashboard(): array
    {
        // TABLE USERS (people)
        $out['users']['cols'] = array(
            '#'                => '#',
            'id'               => 'ID', 
            'people_lastname'  => 'Lastname', 
            'people_firstname' => 'Firstname', 
            'people_phone'     => 'Phone', 
            'people_email'     => 'Email', 
            'people_company'   => 'Company', 
            'people_access'    => 'Access', 
            'people_date'      => 'Date', 
            'people_password'  => 'Password',
        );
        $out['users']['rows'] = $this->getData("SELECT * FROM people", true, true);

        // TABLE COMPANY 
        $out['companies']['cols'] = array(
            '#'               => '#',
            'id'              => 'ID', 
            'company_name'    => 'Name', 
            'company_tva'     => 'TVA', 
            'company_country' => 'Country', 
            'company_fk_type' => 'Fk_type', 
            'company_date'    => 'Date'
        );
        $out['companies']['rows'] = $this->getData("SELECT * FROM company", true, true);

        // TABLE INVOICE 
        $out['invoices']['cols'] = array(
            '#'                  => '#',
            'id'                 => 'ID', 
            'invoice_number'     => 'Number', 
            'invoice_date'       => 'Date', 
            'invoice_fk_company' => 'Fk_people',
            'invoice_fk_people'  => 'Fk_people',
        );
        $out['invoices']['rows'] = $this->getData("SELECT * FROM invoice", true, true);

        return $out;
    }

    public function new_user(int $id): array
    {
        $this->connectDb();
        $req = $this->db->query("SELECT * FROM `people` WHERE id={$id}");
        $user = $req->fetch();
        $this->closeDb();

        return $user;
    }
}