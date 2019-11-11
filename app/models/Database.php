<?php declare(strict_types=1);

/*
 * Database Class
 *   - connect to the database
 *   - create prepared stmts
 *   - bind Values
 *   - return rows and results
 */

class Database 
{
    private $db_driver;
    private $db_host;
    private $db_username;
    private $db_password;
    private $db_name;
    private $db_options;
    protected $db;
    protected $errors = [];

    public function __construct() 
    {
        $this->db_driver   = getenv('DB_DRIVER');
        $this->db_host	   = getenv('DB_HOST');
        $this->db_username = getenv('DB_USERNAME');
        $this->db_password = getenv('DB_PASSWORD');
        $this->db_name	   = getenv('DB_NAME');
        $this->db_options  = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );
        $this->db_dsn = "{$this->db_driver}:host={$this->db_host};dbname={$this->db_name};charset=utf8"; 
    }

    public function open(): void
    {
        try 
        {
            $this->close();
            $this->db = new PDO($this->db_dsn, $this->db_username, $this->db_password, $this->db_options);
        } 
        catch (PDOException $e) {$this->errors['sql'][] = $e->getMessage();}
    }

    public function close(): void
    {
        $this->db = null;
        $this->errors = [];
    }
    

}