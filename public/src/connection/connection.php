<?php
class MysqlConnection
{
    private $pdoConnection;
    private $stmt;

    public function __construct(string $username, string $database)
    {
        $this->pdoConnection = new PDO('mysql:host=localhost;dbname=' . $database, $username);
        $this->pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function select(string $sql): array
    {
        $this->stmt = $this->pdoConnection->prepare($sql);
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert()
    {
        $i = 0;

        while ($i != 50) {
            $sql = sprintf('INSERT INTO users Values("Valentin", "Mont", 19)');
            #$sql = sprintf('INSERT INTO ' . $table . ' Values(' . $name . ', ' . $firstname . ', ' . $age . ')');
            #echo ($sql);
            $this->stmt = $this->pdoConnection->prepare($sql);
            $this->stmt->execute();
            $i = $i + 1;
        }
    }
    public function delete(string $table)
    {
        $this->stmt = $this->pdoConnection->prepare("DELETE FROM $table");
        $this->stmt->execute();
    }
}
