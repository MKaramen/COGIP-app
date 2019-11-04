<?php

declare(strict_types=1);

/*
 * Database Class
 *   - connect to the Database
 *   - create prepared stmts
 *   - bind Values
 *   - return Rows and Results
 */
class Database 
{

    private $driver   = 'mysql';
    private $host	  = 'localhost';
	private $username = 'root';
	private $password = '';
    private $dbname	  = 'cogip_test';
    private $options  = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );

    private $stmt;
    protected $con;

    public function __construct() 
    {
        $this->dsn = "{$this->driver}:host={$this->host};dbname={$this->dbname};charset=utf8"; 
    }

    protected function open() 
    {
        try 
        {
            $this->con = null;
            $this->con = new PDO($this->dsn, $this->username, $this->password, $this->options);
        } 
        catch (PDOException $e) 
        {
            echo 'There is some problem in connection: ' . $e->getMessage();
        }
    }

    protected function close() {
        $this->con = null;
	}

    protected function insert($query, $bindings=[])
    {

    }

    public function update($query, $bindings = []);

    /**
     * Run a delete statement against the database.
     *
     * @param  string  $query
     * @param  array   $bindings
     * @return int
     */
    public function delete($query, $bindings=[]);

    /**
     * Execute an SQL statement and return the boolean result.
     *
     * @param  string  $query
     * @param  array   $bindings
     * @return bool
     */

}