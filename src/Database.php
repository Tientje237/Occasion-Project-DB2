<?php
namespace Occasion;
interface Database {

    public function __construct(string $host, string $dbname, string $username, string $password);

    public function select($table, $columns, $conditions);
    public function insert($table, $data);
    public function update($table, $data, $conditions);
    public function delete($table, $conditions);
}
?>

