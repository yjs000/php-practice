<?php

$pdo = require 'connect.php';

$sql = 'insert into books(title, isbn, published_date, publisher_id)
        values(:title, :isbn, :published_date, :publisher_id)';

$statement = $pdo->prepare($sql);

//unbound statements
// $statement->execute([
// 	'last_name' => 'Aaron',
// 	'first_name' => 'Henry',
// ]);

// bound statements
$books = [
  [
    'title' => 'hello',
    'isbn' => '1111111111111',
    'published_date' => date("Y-m-d H:i:s"),
    'publisher_id' => 1
  ],
  [
    'title' => 'this',
    'isbn' => '2222222222222',
    'published_date' => date("Y-m-d H:i:s"),
    'publisher_id' => 1
  ],
  [
    'title' => 'world',
    'isbn' => '3333333333333',
    'published_date' => date("Y-m-d H:i:s"),
    'publisher_id' => 1
  ]
  ];

foreach($books as $book){
  $statement->bindValue(':title', $book['title']);
  $statement->bindValue(':isbn', $book['isbn']);
  $statement->bindValue(':published_date', $book['published_date']);
  $statement->bindValue(':publisher_id', $book['publisher_id']);
  $statement->execute();
};

// change the author variable
// $author['first_name'] = 'Tom';
// $author['last_name'] = 'Abate';

?>