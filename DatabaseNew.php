<?php

class Database {
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct() {
        $this->loadConfig();
        $this->connect();
    }

    private function loadConfig() {
    $configFile = __DIR__ . "/database.php";

    if (!file_exists($configFile)) {
        die("ERROR: File konfigurasi database tidak ditemukan: " . $configFile);
    }

    require $configFile;

    if (!isset($config) || !is_array($config)) {
        die("ERROR: Variabel \$config tidak ditemukan atau bukan array.");
    }

    $this->host     = $config['host'];
    $this->user     = $config['username'];
    $this->password = $config['password'];
    $this->db_name  = $config['database'];
}


    private function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    // ✅ Tambahkan method ini
    public function getConnection() {
        return $this->conn;
    }

    public function get($table, $where = null) {
        $sql = "SELECT * FROM $table";

        if ($where) {
            $sql .= " WHERE $where";
        }

        $result = $this->conn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }

    public function getAll($table, $where = null) {
        $sql = "SELECT * FROM $table";

        if ($where) {
            $sql .= " WHERE $where";
        }

        return $this->conn->query($sql);
    }

    public function insert($table, $data) {
        if (!is_array($data)) {
            return false;
        }

        $columns = array_keys($data);
        $values  = array_map(function ($val) {
            return "'" . htmlspecialchars($val, ENT_QUOTES) . "'";
        }, array_values($data));

        $sql = "INSERT INTO $table (" . implode(",", $columns) . ") 
                VALUES (" . implode(",", $values) . ")";

        return $this->conn->query($sql);
    }

    public function update($table, $data, $where) {
        if (!is_array($data)) {
            return false;
        }

        $updateParts = [];
        foreach ($data as $key => $val) {
            $updateParts[] = "$key='" . htmlspecialchars($val, ENT_QUOTES) . "'";
        }

        $sql = "UPDATE $table SET " . implode(",", $updateParts) . " WHERE $where";

        return $this->conn->query($sql);
    }

    public function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE $where";
        return $this->conn->query($sql);
    }
}
