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

    /* */
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

    /* */
    public function open(): void
    {
        try 
        {
            $this->close();
            $this->db = new PDO($this->db_dsn, $this->db_username, $this->db_password, $this->db_options);
        } 
        catch (PDOException $e) {$this->errors['sql'][] = $e->getMessage();}
    }

    /* */
    public function close(): void
    {
        $this->db = null;
        $this->errors = [];
    }

    /* Read data from database and returns an array */
    public function read($sql): array
    {
        $this->open();
        $out = [];
        $req = $this->db->query($sql);
        while ($row = $req->fetch()) {$out[] = $row;}
        $this->close();

        return $out;
    }
    
    /* Returns data from database table */
    public function getRowsOfTable(string $table): array {return $this->read("SELECT * FROM {$table}");}

    /* Returns the structure of table (array of columns) */
    public function getColumnsOfTable(string $table, string $dbname=''): array
    {
        $this->open();
        $dbname = $dbname ? $dbname : $this->db_name;
        $sql = "SELECT column_name 
                FROM information_schema.columns  
                WHERE table_schema = '{$dbname}' AND table_name = '{$table}'";
        $req  = $this->db->query($sql);
        $out = $req->fetchAll();
        $out = array_column($out, 'column_name');
        $this->close();

        return $out;
    }

    public function insert(string $table, array $data=[], string $access='god'): void
    {
        $this->open(); 
        $keys = array_keys($data);
        $fields = implode(', ' , $keys);
        $values = implode(', :', $keys);
        $sql = "INSERT INTO $table ($fields) VALUES (:$values)"; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        $this->close();
    }

    public function update(string $table, array $data=[], int $id, string $access='god'): void
    {
        $this->open();
        $fields = '';
        foreach ($data as $key => $value) $fields .= "$key=:$key,";
        $fields = rtrim($fields, ',');
        $sql = "UPDATE $table SET $fields WHERE id=$id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        $this->close();
    }

    public function delete(string $table, int $id, $access='god'): void
    {
        $this->open();
        $sql = "DELETE FROM $table WHERE id=$id";
        $this->db->query($sql);
        $this->close();
    }


    

}