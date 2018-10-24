<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <form action="/edit" method="POST">
            <h4 style="margin-bottom:4px"> EDIT ENTRY FORM </h4>

            <input type="hidden" name="id" value="<?= $person->id ?>">

            <label for="first_name">First Name:</label>
            <br>
            <input type="text" name="first_name" id="first_name" value="<?= $person->first_name ?>">

            <br>

            <label for="last_name">Last Name:</label>
            <br>
            <input type="text" name="last_name" id="last_name" value="<?= $person->last_name ?>">

            <br>
            <br>

            <input type="submit" value="Edit This Entry!" name='edit' value='edit'/>
        </form>
    </body>
</html>
