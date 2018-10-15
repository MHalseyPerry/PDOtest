<?php
require 'QueryBuilder.php';

$db = new QueryBuilder('root','');
$persons = $db->fetchAll('people');
$id = $_GET['person'];
foreach($persons as $person):
    if($person->id == $id){
        $fn = $person->first_name;
        $ln = $person->last_name;
    }
endforeach;
?>

<!DOCTYPE html>
    <html>
        <head>

        </head>

        <body>
            <form action="form_logic.php" method="POST">
                <h4 style="margin-bottom:4px"> EDIT ENTRY FORM </h4>

                <input type="hidden" name="id" value="<?= $id ?>">

                <label for="first_name">First Name:</label>
                <br>
                <input type="text" name="first_name" id="first_name" value="<?= $fn ?>">

                <br>

                <label for="last_name">Last Name:</label>
                <br>
                <input type="text" name="last_name" id="last_name" value="<?= $ln ?>">

                <br>
                <br>

                <input type="submit" value="Edit This Entry!" name='edit' value='edit'/>
            </form>
        </body>
    </html

