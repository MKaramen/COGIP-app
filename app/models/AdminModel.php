<?php
class AdminModel extends Database
{

    public static function adapt_array(): array
    {
        $newArray = [];
        $post = Helper::getPost();
        foreach ($post as $key => $value) {
            switch ($key) {
                case $key == "submit":
                    break;
                case $key == "people_password":
                    $value = password_hash($value, PASSWORD_DEFAULT);
                    $newArray[$key] = $value;
                    break;
                default:
                    $newArray[$key] = $value;
            }
        }
        return $newArray;
    }

    public function new_content($table_name): void
    {
        $arrayKeys = [];
        $arrayValues = [];

        $post =  self::adapt_array();
        foreach ($post as $key => $value) {
            $arrayKeys[] = $key;
            $arrayValues[] = $value;
        }

        $columns = self::stringKeys($arrayKeys);
        $values = self::stringValues($arrayValues);

        $request = "INSERT INTO $table_name(" . $columns . ") VALUES(" . $values . ");";
        self::insertData($request);


        // echo $request;
    }

    public function delete_content($table_name, $id): void
    {
        $request = "DELETE FROM $table_name WHERE id=$id";
        self::deleteData($request);
    }

    public function update_content($table_name, $id): void
    {
        $request = "UPDATE FROM $table_name WHERE id=$id";
        self::update_content($request);
    }

    /*
        Preload information for the invoice form such as the company and all the people working for it 
    */
    public  function preloadInvoice(): array
    {
        $request_company = "SELECT * FROM company";
        $result_company = $this->getData($request_company);
        $result['company'] = $result_company;


        $request_people = "SELECT * FROM people";
        $result_people = $this->getData($request_people);
        $result['people']  = $result_people;


        $request_linkBetween_peopleCompany = "SELECT * FROM people_has_company";
        $result_link = $this->getData($request_linkBetween_peopleCompany);
        $result['link'] = $result_link;

        return $result;
    }

    public function request_people($request): array
    {
        $request_people = $request;
        $result_people = $this->getData($request_people);
        $result['people']  = $result_people;
        return $result;
    }

    /* Check if the username (people_lastname) is in the database */
    public function isUserFound(string $username): bool
    {
        $this->open();
        $userQuery = $this->db->prepare("SELECT * FROM people WHERE people_lastname=:people_lastname");
        $userQuery->execute(array('people_lastname' => $username));
        $this->close();
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
        $out['users']['rows'] = $this->getRowsOfTable('people');
        // TABLE COMPANY 
        $out['companies']['cols'] = array(
            'id'              => 'ID',
            'company_name'    => 'Name',
            'company_tva'     => 'TVA',
            'company_country' => 'Country',
            'company_fk_type' => 'Fk_type',
            'company_date'    => 'Date'
        );
        $out['companies']['rows'] = $this->getRowsOfTable('company');
        // TABLE INVOICE 
        $out['invoices']['cols'] = array(
            'id'                 => 'ID',
            'invoice_number'     => 'Number',
            'invoice_date'       => 'Date',
            'invoice_fk_company' => 'Fk_people',
            'invoice_fk_people'  => 'Fk_people',
        );
        $out['invoices']['rows'] = $this->getRowsOfTable('invoice');
        return $out;
    }
}
