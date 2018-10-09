<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NamesDB</title>
    </head>

    <body>
        <table style="width:50% "border=1">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>

             <?php foreach ($names as $name): ?>
             <tr>
                <td><?="$name->id"?></td>
                <td><?="$name->first_name"?></td>
                <td><?="$name->last_name"?></td>
             </tr>
             <?php endforeach; ?>
        </table>

        <a href="create-new.php">Add Entry!</a>
    </body>
</html>
