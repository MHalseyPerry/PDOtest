<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

$user = 'root';
$pass = '';

try {
	$db = new PDO('mysql:host=localhost;dbname=pdo_test', $user, $pass);
} catch (PDOException $e) {
	die($e->getMessage());
}

$query = $db->prepare('SELECT * FROM names');
$query->execute();

$names = $query->fetchAll(PDO::FETCH_OBJ);

if ($_POST) {
	echo 'inpost';
	if ($_POST['firstName']) {
		$firstName = $_POST['firstName'];
	}

	if ($_POST['lastName']) {
		$lastName = $_POST['lastName'];
	}

	if ($lastName && $firstName) {
		echo "$lastName, $firstName";
		$query = $db->prepare("INSERT INTO names VALUES(':first_name', ':last_name')");
		$query->execute([
			'first_name' => $firstName,
			'last_name' => $lastName,
		]);
	} else {
		echo 'fail';
		return false;
	}
}

require 'index.view.php';
