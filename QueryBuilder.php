<?php
require 'config.php';

class QueryBuilder
{

    public function __construct($config)
    {
        try {
            $this->db = new PDO(
                $config['connection'].';dbname=' .$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
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
