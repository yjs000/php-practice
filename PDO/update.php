<?php 
$pdo = require_once 'connect.php';

$publisher = [
	'publisher_id' => 5,
	'name' => 'sebin'
];

$sql = 'UPDATE publishers
        SET name = :name
        WHERE publisher_id = :publisher_id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':publisher_id', $publisher['publisher_id'], PDO::PARAM_INT);
$statement->bindParam(':name', $publisher['name']);

if($statement->execute()){
  echo "The publisher has been updated succesfully!";
}

//prepare안쓰고 query로 -> fetchAll로도 가능
//prepare을 쓰는 이유는 sql injection때문
?>