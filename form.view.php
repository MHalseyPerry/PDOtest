<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'functions.php';
$db = connectToDB();
$people = fetchAll($db);
?>

<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <form action="add_entry.php" method="POST">
            <h4 style="margin-bottom:4px"> ADD FORM </h4>

            <label for="first_name">First Name:</label>
            <br>
            <input type="text" name="first_name" id="first_name">

            <br>

            <label for="last_name">Last Name:</label>
            <br>
            <input type="text" name="last_name" id="last_name">

            <br>
            <br>

            <input type="submit" value="Create This Entry!"/>
        </form>





        <form action="delete_entry.php" method="POST">
            <h4 style="margin-bottom:4px"> DELETE FORM </h4>
            <select name="person_id">
                <?php foreach ($people as $person): ?>
                    <option value="<?= $person->id ?>">
                        <?= $person->first_name ." ". $person->last_name ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Delete This Entry!"/>
        </form>
    </body>
</html>
