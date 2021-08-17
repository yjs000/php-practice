<?php 
// SQL statement for creating new tables
$statements = [
  'CREATE TABLE IF NOT EXISTS posts (
    id int not null primary key auto_increment,
    title varchar(100) not null,
    description varchar(255) not null,
    created_at datetime not null default current_timestamp,
    updated_at datetime not null default current_timestamp,
    writer_id int not null,
    constraint fk_writer_id foreign key (writer_id)
      references users (id)
);',
// 'CREATE TABLE IF NOT EXISTS books (
//   book_id INT AUTO_INCREMENT,
//   title VARCHAR(255) NOT NULL,
//   isbn VARCHAR(13) NULL,
//   published_date DATE NULL,
//   publisher_id INT NULL,
//   PRIMARY KEY (book_id),
//   CONSTRAINT fk_publisher FOREIGN KEY (publisher_id)
//       REFERENCES publishers (publisher_id)
// );',
// 	'CREATE TABLE authors( 
//         author_id   INT AUTO_INCREMENT,
//         first_name  VARCHAR(100) NOT NULL, 
//         middle_name VARCHAR(50) NULL, 
//         last_name   VARCHAR(100) NULL,
//         PRIMARY KEY(author_id)
//     );',
// 	'CREATE TABLE book_authors (
//         book_id   INT NOT NULL, 
//         author_id INT NOT NULL, 
//         PRIMARY KEY(book_id, author_id), 
//         CONSTRAINT fk_book 
//             FOREIGN KEY(book_id) 
//             REFERENCES books(book_id) 
//             ON DELETE CASCADE, 
//             CONSTRAINT fk_author 
//                 FOREIGN KEY(author_id) 
//                 REFERENCES authors(author_id) 
//                 ON DELETE CASCADE
//     )'
];

// connect to the database
require 'config.php';

// execute SQL statements
foreach ($statements as $statement) {
	$pdo->exec($statement);
}