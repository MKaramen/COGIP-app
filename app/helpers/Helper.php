<?php declare(strict_types=1);


/** 
* Helper class
*/
class Helper 
{

    public static function view(string $view, array $dataInfo, array $dataModel): void
    {
        $file = getenv('APP_ROOT') . '/app/views/' . $view . '.php';

        if(!file_exists($file)) throw new Exception($file . ' is not found!');
        if(!is_readable($file)) throw new Exception($file . ' is not readable!');

        require_once $file;
    }

    /* Redirect to specific page */
    public static function to(string $page): void {exit(header('location: ' . getenv('APP_URL') . $page));}
    
    /* Redirect to same page */
    public static function back(): void {exit(header('location: ' . $_SERVER['REQUEST_URI']));}

    /* Static method to var dump with pre */ 
    public static function dump($vars): void
    {
        echo '<pre>';
        var_dump($vars);
        echo '</pre>';
    }

    /* Get all $_POST from the form page */
    public static function getPost(): array {return (isset($_POST)) ? $_POST : [];}

    /* Uppercase the first letter/s of a string, including where the names are joined by a hyphens)*/
    public static function capitalize(string $word): string 
    {
        return implode('-', array_map('ucfirst', explode('-', ucwords($word))));
    }

    /** Create a table, make every single element clickable and 
     * it redirects the user to the right detail page 
     */
    public static function makeTable(string $categoryName, array $dataModel): void
    {
        # Heading (<thead>)
        // echo '<thead class="text-center">';
        // foreach ($dataModel[$categoryName]['col'] as $colName) 
        // {
        //     echo '<tr><th scope="col">' . $colName . '</th></tr>';
        // }
        // echo '</thead>';

        # Body (<tbody>)
        // echo '<tbody>';
        // foreach ($dataModel[$categoryName]['row'] as $user) 
        // {
        //     foreach ($user as $key => $value) 
        //     {
        //         echo '<tr><td>' . $value . '</td></tr>';

        //         // Create all the col with the values and cliclable links
        //     }
        // }
        // echo '</tbody>';
    }



}