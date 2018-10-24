<?php

$id = $_GET['person'];
$successful = $query->deleteEntry($id);

if ($successful) {
    header('Location: /');
} else {
    die('failed');
}
