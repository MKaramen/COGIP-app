<?php
class Database
{
    protected $db;
    protected $fetchInfo;


    public function __construct()
    {
        $this->dns = getenv('DB_DRIVER');
        $this->nameHost = getenv('DB_HOST');
        $this->nameDb = getenv('DB_NAME');
        $this->username = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');
    }
    // Function that will be called before every single request 
    // $db = new PDO('mysql:host=database;dbname=cogip_test', 'root', 'root');
    public function connectDb()
    {
        $this->closeDb();
        $this->db = new PDO("{$this->dns}:host={$this->nameHost};dbname={$this->nameDb}", "{$this->username}", "{$this->password}", array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ));
    }

    public function closeDb()
    {
        $this->db = null;
    }
    // Get data from the DB => Solve column issues array ??
    // $getData = $db->query("SELECT columnsToSelect FROM name_of_table");
    public function getData($request)
    {
        // Fetch data and put in an assoc array called arrData 
        $arrData = [];
        $number = 1;

        $this->connectDb();
        $req = $this->db->query($request);
        while ($this->fetchInfo = $req->fetch()) {
            $arrData[] = array_merge(array('number' => $number), $this->fetchInfo);
            $number++;
        }
        $this->closeDb();

        return $arrData;
    }
    // INSERT Data
    // $insertData = $db->exec('INSERT INTO name_of_table($colums) VALUES ($valuesToInsert)');
    public function insertData($request)
    {
        $this->connectDb();
        $req = $this->db->query($request);
        $this->closeDb();
        return $req;
    }
    //UPDATE DATA 
    // $updateData = $db->exec('UPDATE name_of_table SET newValueToSet WHERE condition');
    public function updateData($request)
    {
        $this->connectDb();
        $req = $this->db->query($request);
        $this->closeDb();
        return $req;
    }
    // DELETE DATA 
    // $deleteData = $db->exec('DELETE FROM name_of_table WHERE condition');
    public function deleteData($name_of_table, $condition)
    {
        $this->connectDb();
        $req = $this->db->query($request);
        $this->closeDb();
        return $req;
    }

    public static function stringKeys($array)
    {

        $string = implode(", ", $array);
        return $string;
    }

    public static function stringValues($array)
    {

        $string = '"' . implode('","', $array) . '"';
        return $string;
    }
}
