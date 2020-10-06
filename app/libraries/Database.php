<?php



class Database
{
    private $host = HOST;
    private $dbname = DB_NAME;
    private $user = USER;
    private $pass = PASS;


    private $pdo;
    private $statement;
    public $error;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->error = 'Failed to connect database: ' . $e->getMessage() . ' ' . $e->getLine() . ' ' . $e->getFile();
            echo "<p class='alert alert-danger'>$this->error</p>";
        }
    }
    private function query(string $sql, $param = [])
    {
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute($param);
        return $this->statement;
    }

    public function all(string $tableName)
    {
        $sql = "SELECT * FROM $tableName;";
        $result = $this->query($sql);
        return $result->fetchAll();
    }
    public function count(string $tableName)
    {
        $sql = "SELECT count(*) FROM $tableName";
        $result = $this->query($sql);
        return $result;
    }
    public function add(string $tablename, array $params)
    {
        $sql = 'INSERT INTO ' . $tablename . '(';
        foreach ($params as $key => $value) {
            $sql .= $key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql .= ') VALUES (';
        foreach ($params as  $key => $value) {
            $sql .= ':'.$key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql .= ')';
        echo $sql;
        $this->query($sql, $params);
    }
    public function findById(string $tableName, int $id)
    {
        $sql = "SELECT * FROM $tableName WHERE id:id";
        $param = [':id' => $id];
        $result = $this->query($sql, $param);
        return $result->fetch();
    }

    public function findUser(string $tableName, $key, $value)
    {
        $sql = "SELECT * FROM $tableName WHERE $key=:$key";
        $params = [":$key" => $value];
        $result = $this->query($sql, $params);
        if ($result->rowCount() > 0) {
            return $result->fetch();
        }
    }
}
