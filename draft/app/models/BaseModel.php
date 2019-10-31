<?php

class BaseModel extends Database
{
    public static function displayPage($page)
    {
        $obj = new static();
        if ($page == "company.php") {
            $sql = "SELECT * from company";
            return $obj->getData($sql);
        }
    }
}
