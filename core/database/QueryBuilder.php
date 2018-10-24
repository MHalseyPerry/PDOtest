<?php

class QueryBuilder
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function selectAll($table)
    {
        $query = $this->db->prepare("SELECT * FROM {$table}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectOne($table, $id)
    {
        $query = $this->db->prepare("SELECT * FROM {$table} WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetchObject();
    }


    public function addEntry($firstName, $lastName)
    {
        if ($lastName && $firstName) {
            try {
                $query = $this->db->prepare("INSERT INTO people (first_name, last_name) VALUES (:first_name, :last_name)");
                $query->execute([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                ]);

                return true;
            } catch (Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }


    public function deleteEntry($id)
    {
        if($id){
            try {
                $query = $this->db->prepare("DELETE FROM people WHERE id = :id");
                $query->execute(['id'=>$id]);

                return true;
            }catch (Exception $e){
                return false;
            }
        } else {
            return false;
        }
    }


    public function editEntry($id,$firstName, $lastName)
    {
        if($firstName&&$lastName){
            try{
                $query = $this->db->prepare("UPDATE people SET first_name = :first_name, last_name = :last_name WHERE id = :id");
                $query->execute([
                    'id' => $id,
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                ]);

                return true;
            }catch (Exception $e){
                return false;
            }
        } else {
            return false;
        }
    }



}
