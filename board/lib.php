<?php 
session_start();

function isLoggedIn() {
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']===true){
   return true;
  }  else {
    return false;
  }
}

function editButton($id) {
  header("location: write_post.php?edit=$id");
}

function deleteButton(\PDO $pdo, $id) {
  $sql = "delete from posts where id=:id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(":id", $id, PDO::PARAM_INT);
  if($stmt->execute()){
    header("location: index.php");
  }
}
?>