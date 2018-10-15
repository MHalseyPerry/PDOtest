<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'QueryBuilder.php';

$db = new QueryBuilder('root','');
$people = $db->fetchAll('names');
?>

<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <form action="form_logic.php" method="POST">
            <h4 style="margin-bottom:4px"> ADD ENTRY FORM </h4>

            <label for="first_name">First Name:</label>
            <br>
            <input type="text" name="first_name" id="first_name">

            <br>

            <label for="last_name">Last Name:</label>
            <br>
            <input type="text" name="last_name" id="last_name">

            <br>
            <br>

            <input type="submit" value="Create This Entry!" name='add' value='add'/>
        </form>
    </body>
</html>
