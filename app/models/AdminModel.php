<?php
class AdminModel extends Database
{

    public static function adapt_array(): array
    {
        $newArray = [];
        $post = Helper::getPost();
        foreach ($post as $key => $value) {
            switch ($key) {
                case $key == "people_name":
                case $key == "submit":
                case $key == "people_firstName":
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
}
