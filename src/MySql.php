<?php
namespace Occasion;

use PDO;

class MySql implements Database {

    protected PDO $connection;

    public function __construct(string $host, string $dbname, string $username, string $password) {
        $this->connection = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function select($table, $columns, $conditions = '1') {
        $sql = "SELECT " . implode(', ', $columns) . " FROM $table WHERE $conditions";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($table, $data, $conditions) {
        $setClause = '';
        foreach ($data as $column => $value) {
        if ($value === 'CURRENT_TIMESTAMP') {
            $setClause .= "$column = CURRENT_TIMESTAMP, ";
        } else {
            $setClause .= "$column = :$column, ";
        }
        }
        $setClause = rtrim($setClause, ', ');
        $sql = "UPDATE $table SET $setClause WHERE $conditions";
        $stmt = $this->connection->prepare($sql);

        $filteredData = array_filter($data, fn($value) => $value !== 'CURRENT_TIMESTAMP');
        return $stmt->execute($filteredData);
    }

    public function delete($table, $conditions) {
        $sql = "DELETE FROM $table WHERE $conditions";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }
}
?>
