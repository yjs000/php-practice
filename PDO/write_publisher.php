<?php

$pdo = require 'connect.php';

$sql = 'insert into publishers(name)
        values(:name)';

$statement = $pdo->prepare($sql);

//unbound statements
// $statement->execute([
// 	'last_name' => 'Aaron',
// 	'first_name' => 'Henry',
// ]);

// bound statements
$statement->bindValue(':name', 'jisu');


// change the author variable
// $author['first_name'] = 'Tom';
// $author['last_name'] = 'Abate';

$statement->execute();
?>