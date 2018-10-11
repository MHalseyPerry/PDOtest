<?php

class QueryBuilder
{

    public function __construct($user,$pass)
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=people', $user, $pass);  // Try catch statement connects to database into $db var
            echo'connected';
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function fetchAll($table)
    {
        $query = $this->db->prepare("SELECT * FROM {$table}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function addEntry($db, $firstName, $lastName)
    {
        if ($lastName && $firstName) {
            try {
                $query = $this->db->prepare("INSERT INTO names (first_name, last_name) VALUES (:first_name, :last_name)");
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


    public function deleteEntry($db, $id)
    {
        if($id){
            try {
                $query = $this->db->prepare("DELETE FROM names WHERE id = :id");
                $query->execute([
                    'id'=>$id,
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
