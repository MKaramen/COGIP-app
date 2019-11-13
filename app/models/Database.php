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
    private $fetchInfo;
    protected $db;

    public function __construct() 
    {
        $this->db_driver   = getenv('DB_DRIVER');
        $this->db_host	   = getenv('DB_HOST');
        $this->db_username = getenv('DB_USERNAME');
        $this->db_password = getenv('DB_PASSWORD');
        $this->db_name	   = getenv('DB_NAME');
        $this->db_options  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );
        $this->db_dsn = "{$this->db_driver}:host={$this->db_host};dbname={$this->db_name};charset=utf8"; 
    }

    public function closeDb(): void {$this->db = null;}

    public function connectDb(): void
    {
        $this->closeDb();
        $this->db = new PDO($this->db_dsn, $this->db_username, $this->db_password, $this->db_options);
    }

    /* Get data from the DB => Solve column issues array */
    public function getData(string $sql, bool $storeNumbers=false, bool $storeId=false): array
    {
        // Fetch data and put in an assoc array called $out
        $this->connectDb();
        $out = [];
        $number = 1;
        $req = $this->db->query($sql);
        while ($this->fetchInfo = $req->fetch()) {
            $out[] = array_merge(
                $storeNumbers ? array('#' => $number) : [], 
                $storeId ? $this->fetchInfo : array_slice($this->fetchInfo, 0)
            );
            $number++;
        }
        $this->closeDb();

        return $out;
    }

    public function getCompanies(): array
    {
        $this->connectDb();
        $req = $this->db->query("SELECT company_name FROM `company`");
        $out = [];
        while ($this->fetchInfo = $req->fetchColumn()) {
            $out[] = $this->fetchInfo;
        }
        $this->closeDb();
        
        return $out;
    }

    public function insert(string $table, array $data=[], string $access='god'): void
    {
        $this->connectDb(); 
        $keys = array_keys($data);
        $fields = implode(', ' , $keys);
        $values = implode(', :', $keys);
        $sql = "INSERT INTO $table ($fields) VALUES (:$values)"; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        $this->closeDb();
    }

    public function update(string $table, array $data=[], int $id, string $access='god'): void
    {
        $this->connectDb();
        $fields = '';
        foreach ($data as $key => $value) $fields .= "$key=:$key,";
        $fields = rtrim($fields, ',');
        $sql = "UPDATE $table SET $fields WHERE id=$id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        $this->closeDb();
    }

    public function delete(string $table, int $id, $access='god'): void
    {
        $this->connectDb();
        $sql = "DELETE FROM $table WHERE id=$id";
        $this->db->query($sql);
        $this->closeDb();
    }

    
}