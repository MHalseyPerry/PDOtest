<?php include "partials/header.php";?>


<table style="width: 50%; border-collapse: collapse;"border="1">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

        <?php foreach ($persons as $person): // persons must be something other than an array OO I KNOW ?>
        <tr>
            <td><?="$person->id"?></td>
            <td><?="$person->first_name"?></td>
            <td><?="$person->last_name"?></td>
            <td><a href="/edit?person=<?=$person->id?>">Edit</a></td>
            <td><a href="/delete?person=<?=$person->id?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
</table>


<a style= display:block;padding-bottom:15px href="/add">Add Entry</a>




<?php include "partials/nav.php"; ?>

<?php include"partials/footer.php"; ?>
