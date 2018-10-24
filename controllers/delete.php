<?php

$id = Request::input('person');
$successful = $query->deleteEntry($id);

if ($successful) {
    header('Location: /');
} else {
    die('failed');
}
