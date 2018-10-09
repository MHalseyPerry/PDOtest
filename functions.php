<?php

function connectToDB($user, $pass)
{
    try {
        return new PDO('mysql:host=localhost;dbname=pdo_test', $user, $pass);  // Try catch statement connects to database into $db var
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

// We now take the first/last name as parameters
// instead of accessing the $_POST super global.
// This means that `addEntry` is now a 'pure' function (sort of).
// Pure functions are functions that have no side effects - this
// one does but thats sort of the nature of PHP, we can call it pure
// because it will do the exact same thing every time we call it, assuming
// we give it the same parameters. It's generally a good practice to
// not access input data inside of functions like this - it makes it
// more reusable. For example, if you needed to programatically create
// a user called 'John Smith' (not a great example but focus on the concept),
// we can just call `addEntry($db, 'John', 'Smith')`.
function addEntry($db, $firstName, $lastName)
{
    if ($lastName && $firstName) {
        $query = $db->prepare("INSERT INTO names (first_name, last_name) VALUES (:first_name, :last_name)");
        $query->execute([
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);

        // I've moved the redirect to keep the function pure,
        // and am just returning true so we can decide whether
        // the function was successfuly where we called it.
        return true;
    } else {
        // This `return false` is good, it means we can assume
        // the function was not successful if false was returned
        return false;
    }

    // You might want a try/catch around all of this in case the query fails.
    // You can just put a `return false` in the catch, to tell the caller that
    // we failed to insert.
}
