<?php

declare(strict_types=1);


/** 
* Descritpion
*/
class Helper 
{

    public static function view(string $view, array $data= []): void
    {
        // Require view file
        $path = getenv('APP_ROOT') . '/app/views/' . $view . '.php';

        if(!file_exists($path)) throw new Exception($path . 'not found!');

        require_once $path;
    }

    /* Redirect to specific page */
    public static function to(string $page): void 
    {
        header('location: ' . $page);
    }
    
    /* Redirect to same page */
    public static function back(): void 
    {
        $uri = $_SERVER['REQUEST_URI'];
        header('location: ' . $uri);
    }
}


    // public static function baseURL(string $page): string
    // {
    //     return self::getAppURL() . '/' . $page;
    // }

    // public static function siteURL(string $page): string
    // {
    //     return self::getAppURL() . '/index.php/' . $page;
    // }

    /* Returns post request data */
    // public static function postRequest(bool $is_array=true): array 
    // {
    //     $result = array();
    //     if (count($_GET) > 0)  $result['get'] = $_GET;

    //     return json_decode(json_encode($result), $is_array);
    // }

    // public static function getRequest(bool $is_array=true): array 
    // {
    //     $result = array();
    //     if (count($_POST) > 0) $result['post'] = $_POST;
    //     $result['file'] = $_FILES;
    //     return json_decode(json_encode($result), $is_array);
    // }

    // public static function fileRequest(bool $is_array=true): array 
    // {
    //     $result = array();
    //     if (count($_GET) > 0)  $result['get'] = $_GET;
    //     if (count($_POST) > 0) $result['post'] = $_POST;
    //     $result['file'] = $_FILES;
    //     return json_decode(json_encode($result), $is_array);
    // }

    /**
     * Returns a specific request data
     */
    // public static function get(string $key): array {
    //     $obj = new static();
    //     $data = $obj->all(true);
    //     return $data[$key];
    // }


    /* Get the app URL dynamically */
    // function getAppURL(): string
    // {
    //     if(isset($_SERVER['HTTPS'])) $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
    //     else $protocol = 'http';

    //     return rtrim($protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], '/');
    // }