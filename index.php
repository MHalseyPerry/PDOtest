<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

$user = 'root';
$pass = '';

try {
	$db = new PDO('mysql:host=localhost;dbname=people', $user, $pass);
	/*
	You weren't getting any errors because PDO defaults to silent error reporting
	i.e. ignoring errors and not telling you anything.

	See http://php.net/manual/en/pdo.setattribute.php for the function docs
	See http://php.net/manual/en/pdo.error-handling.php for the different modes you can choose
	*/
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die($e->getMessage());
}

$query = $db->prepare('SELECT * FROM names');
$query->execute();

$names = $query->fetchAll(PDO::FETCH_OBJ);

if ($_POST) {
	echo 'inpost';
	if ($_POST['first_name']) {
		$firstName = $_POST['first_name'];
	}

	if ($_POST['last_name']) {
		$lastName = $_POST['last_name'];
	}

	if ($lastName && $firstName) {
		echo "$lastName, $firstName";
		/*
		The error that was happening (but not showing because of the default mode), was in your SQL.
		You had this SQL:

			INSERT INTO names VALUES (':first_name', ':last_name')

		But, you have 3 columns in the `names` table. SQL doesn't know which 2 you were trying to set.
		We fix that by specifying the columns after the table name in the query:

			INSERT INTO names (first_name, last_name) VALUES (':first_name', ':last_name')

		You also had your bind parameters (:first_name and :last_name) in quotes. The quotes tell PDO
		that you want to insert a literal string, so ':first_name' and ':last_name' were the values
		that ended up in the database. We fix it by just removing the quotes:

			INSERT INTO names (first_name, last_name) VALUES (:first_name, :last_name)

		Then we can bind them exactly like before in the `execute` method.
		*/
		$query = $db->prepare("INSERT INTO names (first_name, last_name) VALUES (:first_name, :last_name)");
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
