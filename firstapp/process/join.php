<?php

use Nette\Schema\Message;

$id = $_POST['id'];
$pw = $_POST['password'];

echo $id;
echo $pw;
echo $name;

try{
  $statement = $pdo -> prepare('INSERT INTO users(user_id, user_password, name) VALUES(:id,:pw,:user_name)');
  $statement->excute([
    ':id' => $id,
    ':pw' => $pw,
    ':user_name' => $name
  ]);
  
} catch(ErrorException $e) {
  echo $e->getMessage();
}

?>