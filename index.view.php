<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NamesDB</title>
    </head>

    <body>
        <ul>
            <?php foreach ($names as $names): ?>
                <li><?= "$names->first_name $names->last_name" ?></li>
            <?php endforeach; ?>
        </ul>

        <a href="create-new.php">Add Entry!</a>
    </body>
</html>
