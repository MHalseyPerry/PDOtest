
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NamesDB</title>
    </head>

    <body>
        <table style="width: 50%; border-collapse: collapse;" border="1">
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

        <a href="form.view.php">Add Entry/Delete Entry</a>
    </body>
</html>
