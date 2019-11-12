<?php

declare(strict_types=1);


/** 
 * Descritpion
 */
class Helper
{

    public static function view(string $view, array $data = [], array $dataModel = []): void
    {
        // Require view file
        $file = getenv('APP_ROOT') . '/app/views/' . $view . '.php';
        if(!file_exists($file)) throw new Exception($file . ' is not found!');
        if(!is_readable($file)) throw new Exception($file . ' is not readable!');
        require_once $file;
    }

    /* Redirect to specific page */
    public static function to(string $page): void
    {
        header('location: ' . $page);x§
    }

    /* Redirect to same page */
    public static function back(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        header('location: ' . $uri);
    }

    // Static methode to var dump with pre 
    public static function dump($var): void
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }

    /*
        Create a table, make every single element clickable and it redirects the user to the right detail page 
     */
    public static function makeTable($categoryName, $dataModel)
    {
        // Var that will be used to redirect to the right page
        $redirection_page;

        echo "<thead>";
        foreach ($dataModel[$categoryName]['col'] as $colName) {
            echo "<th class='text-center'>" . $colName . "</th>";
        }
        echo "</thead>";

        echo "<tbody>";

        // Change value of the var 
        if ($categoryName == "last_invoice" || $categoryName == "invoices") {
            $redirection_page = "invoice";
        } else if ($categoryName == "last_company" || $categoryName == "clients" || $categoryName == "supplier") {
            $redirection_page = "company";
        } else {
            $redirection_page = "user";
        }

        // Create all the col with the values and cliclable links
        foreach ($dataModel[$categoryName]['row'] as $user) {
            echo "<tr>";
            foreach ($user as $key => $value) {
                if ($key != "id") {
                    echo '<td class="text-center"><a href="' . getenv('APP_URL') . '/pages/' . $redirection_page . '">' . $value . "</a></td>";
                }
            }
            echo "</tr>";
        }

        echo "</tbody>";
    }

    // Get all $_POST from the form page 
    public static function getPost(): array
    {
        $out = [];
        if (isset($_POST)) {
            $out = $_POST;
        }
        return $out;
    }

     /* Uppercase the first letter/s of a string, including where the names are joined by a hyphens)*/
     public static function capitalize(string $word): string 
     {
         return implode('-', array_map('ucfirst', explode('-', ucwords($word))));
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
