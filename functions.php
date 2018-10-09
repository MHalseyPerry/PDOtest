<?php

function connectToDB($user, $pass)
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

function addEntry($db)
{
    if ($_POST['first_name']) {
        $firstName = $_POST['first_name'];
    }

    if ($_POST['last_name']) {
        $lastName = $_POST['last_name'];
    }

    if ($lastName && $firstName) {
        $query = $db->prepare("INSERT INTO names (first_name, last_name) VALUES (:first_name, :last_name)");
        $query->execute([
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);
        header("Location: http://pdotest.test:81/index.php");
    } else {
        echo 'fail';
        return false;
    }
}
