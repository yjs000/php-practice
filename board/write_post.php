<?php 
require_once 'config.php';
require_once 'lib.php';

$title = $description = '';
$title_error = $desc_error = '';


if(isLoggedIn()){
  var_dump($_SESSION['id']);

  if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['title'])){
      $title_error = "제목을 입력해주세요";
    } else {
      $title = $_POST['title'];
    };
    
    if(empty($_POST['desc'])){
      $desc_error = "내용을 입력해주세요";
    } else {
      $description = $_POST['desc'];
    };

    if(empty($title_error) && empty($desc_error)){
      $sql = 'insert into posts(title, description, writer_id)
    values (:title, :description, :writer_id)';
    $statement = $pdo->prepare($sql); 

    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':writer_id', $_SESSION['id'], PDO::PARAM_INT);
    
    if($statement->execute()){
      header("location: index.php");  
    }

    
    } else {
      var_dump("desc error : ", $desc_error);
      var_dump("title error : ", $title_error);
    }
  };
}
?>



<!DOCTYPE html>
<html>
  <style type="text/css">
    .from{
      display: flex;
      flex-direction: column;
    }

    .flex-item{
      width: 100%;
    }
  </style>

  <body>
    <?php if(isLoggedIn()){ ?>
      <form class="flex" action="<?php $_SERVER["PHP_SELF"]?>" method="post">
        <label class="flex-item">제목</label>
        <input class="flex-item" type="text" name="title" value=<?php echo $title ?>>
        <p class="flex-item"><?php echo $title_error; ?></p>

        <label class="flex-item">내용</label>
        <textarea class="flex-item" type="text" name="desc"><?php echo $description ?></textarea>
        <p class="flex-item"><?php echo $desc_error; ?></p>
        <input type="submit"/>
      </form>
    <?php } else { ?>
      <p>로그인 후 글을 쓸 수 있습니다!</p>
    <?php }?>
  </body>
</html>