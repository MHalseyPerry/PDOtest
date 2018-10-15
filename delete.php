<?php
require 'QueryBuilder.php';

$db = new QueryBuilder('root','');

if($_GET){
    $id = $_GET['person'];
    $successful = $db->deleteEntry($id);

    if($successful){
        header("Location: /index.php");
    } else {
        echo 'fail';
    }
}

