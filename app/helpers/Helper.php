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

    /**
     * Create a table, make every single element clickable and it redirects the user to the right detail page 
     */
    public static function makeTable(string $categoryName, array $data): void
    {
        // Heading (<thead>)
        echo '<thead>';
        foreach ($data[$categoryName]['cols'] as $colName) echo '<th class="text-center">' . $colName . '</th>';
        echo '</thead>';

        // Variable that will be used to redirect to the right page ($redirection_page)
        if (in_array($categoryName, array('last_invoice', 'invoices'))) $redirection_page = 'invoice';
        elseif (in_array($categoryName, array('last_company', 'clients', 'suppliers'))) $redirection_page = 'company';
        else $redirection_page = 'user';  // $categoryName = 'last_user'

        // Body (<tbody>)
        // Create all the col with the values and cliclable links
        echo '<tbody>';
        foreach ($data[$categoryName]['rows'] as $user) {
            echo '<tr>';
            foreach ($user as $value) {
                echo '<td class="text-left"><a href="' . getenv('APP_URL') . '/pages/' . $redirection_page . '">' . $value . "</a></td>";
            }
            echo '</tr>';
        }
        echo '</tbody>';
    }

    public static function makeAdminTable(array $data, string $page): void
    {
        $rows = $data['rows'];

        // Heading (<thead>)
        echo '<thead class="text-center">';
        echo '<tr><th scope="col">Actions</th>';
        foreach ($data['cols'] as $colName) echo '<th scope="col">' . $colName . '</th>';
        echo '</tr></thead>';

        // Body (<tbody>)
        echo '<tbody>';
        foreach ($rows as $user) 
        {
            echo '<tr>';
            $id = $user['id'];
            $editLink   = getenv('APP_URL') . '/admin/' . $page . '/' . $id;
            $deleteLink = getenv('APP_URL') . '/admin/dashboard/' . $id;
            $actions = '<td><a href="' .$editLink . '">Edit</a> | <a href="' . $deleteLink . '">Delete</a></td> ';
            echo $actions;
            foreach ($user as $key => $value) {
                echo '<td>' . $value . '</td>';
            };
            echo '</tr>';
        }
        echo '</tbody>';
    }


}