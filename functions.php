<?php

function connectToDB($user='root', $pass='')
{
    try {
        return new PDO('mysql:host=localhost;dbname=people', $user, $pass);  // Try catch statement connects to database into $db var
        echo'connected';
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function fetchAll($db)
{
    $query = $db->prepare('SELECT * FROM names');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
}


function addEntry($db, $firstName, $lastName)
{
    if ($lastName && $firstName) {
        try {
            $query = $db->prepare("INSERT INTO names (first_name, last_name) VALUES (:first_name, :last_name)");
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

function deleteEntry($db, $id)
{
    if($id){
        try {
            $query = $db->prepare("DELETE FROM names WHERE id = :id");
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
