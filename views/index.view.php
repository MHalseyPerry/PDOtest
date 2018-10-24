
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
                <th>Edit</th>
                <th>Delete</th>
            </tr>

             <?php foreach ($persons as $person): ?>
                <tr>
                    <td><?="$person->id"?></td>
                    <td><?="$person->first_name"?></td>
                    <td><?="$person->last_name"?></td>
                    <td><a href="/edit?person=<?=$person->id?>">Edit</a></td>
                    <td><a href="/delete?person=<?=$person->id?>">Delete</a></td>
                </tr>
             <?php endforeach; ?>
        </table>

        <a href="/add">Add Entry/Delete Entry</a>
    </body>
</html>
