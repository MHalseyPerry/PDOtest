<?php



class QueryBuilder

{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function fetchAll($table)
    {
        $query = $this->db->prepare("SELECT * FROM {$table}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


}
