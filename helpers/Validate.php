<?php declare(strict_types=1);


/** 
* Validate class
*/
class Validate 
{
    public static function sanitizeNames(string $field)
    {
        $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
        $out = FALSE;
        $opts = array('options' => array('regexp' => '/^[a-zA-Z\s]+$/'));
        if (filter_var($field, FILTER_VALIDATE_REGEXP, $opts)) $out = $field;
        
        return $out;
    }

    public static function sanitizeEmail(string $field)
    {
        $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
        $out = FALSE;
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) $out = $field;
                
        return $out;
    }

    public static function sanitizePhone($field)
    {
        $field = filter_var(trim($field), FILTER_SANITIZE_NUMBER_INT);
        $out = FALSE;
        if (filter_var($field, FILTER_VALIDATE_INT)) $out = $field;

        return $out;
    }
}