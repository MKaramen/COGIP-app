<?php
// Create class CRUD -> create instance for every request 
class CRUD
{
    protected $db;
    private $dns;
    private $nameHost;
    private $nameDb;
    private $username;
    private $password;
    public function __construct($dns, $nameHost, $nameDb, $username, $password)
    {
        $this->dns = $dns;
        $this->nameHost = $nameHost;
        $this->nameDb = $nameDb;
        $this->username = $username;
        $this->password = $password;
    }
    // Function that will be called before every single request 
    // $db = new PDO('mysql:host=database;dbname=cogip_test', 'root', 'root');
    public function connectDb()
    {
        $this->db = new PDO("{$this->dns}:host={$this->nameHost};dbname={$this->nameDb}", "{$this->username}", "{$this->password}", array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ));
    }
    // Get data from the DB => Solve column issues array ??
    // $getData = $db->query("SELECT columnsToSelect FROM name_of_table");
    public function getData($columns, $name_of_table)
    {
        $this->connectDb();
        $req = $this->db->query("SELECT $columns FROM $name_of_table");
        return $req;
    }
    // INSERT Data
    // $insertData = $db->exec('INSERT INTO name_of_table($colums) VALUES ($valuesToInsert)');
    public function insertData($name_of_table, $columns, $valuesToInsert)
    {
        $this->connectDb();
        $req = $this->db->query("INSERT INTO $name_of_table($columns) VALUES($valuesToInsert)");
        return $req;
    }
    //UPDATE DATA 
    // $updateData = $db->exec('UPDATE name_of_table SET newValueToSet WHERE condition');
    public function updateData($name_of_table, $newValueToSet, $condition)
    {
        $this->connectDb();
        $req = $this->db->query("UPDATE $name_of_table SET $newValueToSet WHERE $condition");
        return $req;
    }
    // DELETE DATA 
    // $deleteData = $db->exec('DELETE FROM name_of_table WHERE condition');
    public function deleteData($name_of_table, $condition)
    {
        $this->connectDb();
        $req = $this->db->query("DELETE FROM $name_of_table WHERE $condition");
        return $req;
    }
}