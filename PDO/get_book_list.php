<?php

/**
* Return an array of books with the book id in the $list
*/
function get_book_list(\PDO $pdo, array $list): array
{
    $placeholder = str_repeat('?,', count($list) - 1) . '?';

    $sql = "SELECT book_id, title 
            FROM books 
            WHERE book_id in ($placeholder)";

    $statement = $pdo->prepare($sql);
    $statement->execute($list);

    return  $statement->fetchAll(PDO::FETCH_ASSOC);
}

// connect to the database
$pdo = require 'connect.php';

// get a list of book
$books = get_book_list($pdo, [2, 3]);

print_r($books);