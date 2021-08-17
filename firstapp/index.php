<?php 
// SQL statement for creating new tables
$statements = [
  'CREATE TABLE users(
    user_id VARCHAR(8) NOT NULL,
    user_pssword VARCHAR(8) NOT NULL,
    name VARCHAR(20) NOT NULL,
    PRIMARY KEY(user_id)
  );',
  'CREATE TABLE posts(
    post_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(40) NOT NULL,
    description VARCHAR(100) NOT NULL,
    PRIMARY KEY(post_id)
  );'
];
// connect to the database
$dsn = "mysql:host=localhost;port=3306;dbname=test;charset=utf8;";
$user = "root";
$pass = "111111";
try {
  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); echo "데이터베이스 연결 성공!!<br/>";

} catch(PDOException $e) {
   echo $e->getMessage(); 
  }

// foreach($statements as $statement) {
//   $pdo -> exec($statement);
// }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
  </head>

  <body>  
    <p>hello!</p>
    <a href="/firstapp/views/join.php">회원가입</a>
    <a href="/firstapp/views/login.php">로그인</a>
  </body>
</html>
