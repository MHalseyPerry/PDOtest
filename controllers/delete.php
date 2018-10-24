<?php

$id = Request::input('person');
$successful = $query->delete('people', $id);

if ($successful) {
    header('Location: /');
} else {
    die('failed');
}
