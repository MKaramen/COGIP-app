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
}
