<?php
require_once 'config.php';
require_once 'lib.php';


$title_error = $desc_error = '';


if (isLoggedIn()) {
  //수정인 경우
  if (isset($_GET['edit'])) {
    $sql = "select title, description from posts where id=:id";
    $stmt = $pdo->prepare($sql);
    $id = $_GET['edit'];
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
      $result = $stmt->fetch();
      $title = $result['title'];
      $description = $result['description'];
    }
  }

  //inputs
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['edit'])) {
      if (empty($_POST['title'])) {
        $title_error = "제목을 입력해주세요";
      } else {
        $title = $_POST['title'];
      };

      if (empty($_POST['desc'])) {
        $desc_error = "내용을 입력해주세요";
      } else {
        $description = $_POST['desc'];
      };

      if (empty($title_error) && empty($desc_error)) {
        $sql = "update posts set title=:title, description=:description, writer_id=:writer_id where id=:id";
        $statement = $pdo->prepare($sql);

        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':writer_id', $_SESSION['id'], PDO::PARAM_INT);
        $statement->bindValue(':id', $_GET['edit']);

        if ($statement->execute()) {
          header("location: index.php");
        }
      } else {
        var_dump("desc error : ", $desc_error);
        var_dump("title error : ", $title_error);
      }
    } else {
      if (empty($_POST['title'])) {
        $title_error = "제목을 입력해주세요";
      } else {
        $title = $_POST['title'];
      };

      if (empty($_POST['desc'])) {
        $desc_error = "내용을 입력해주세요";
      } else {
        $description = $_POST['desc'];
      };

      if (empty($title_error) && empty($desc_error)) {
        $sql = 'insert into posts(title, description, writer_id)
      values (:title, :description, :writer_id)';
        $statement = $pdo->prepare($sql);

        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':writer_id', $_SESSION['id'], PDO::PARAM_INT);

        if ($statement->execute()) {
          header("location: index.php");
        }
      } else {
        var_dump("desc error : ", $desc_error);
        var_dump("title error : ", $title_error);
      }
    }
  };
}

?>



<!DOCTYPE html>
<html>
<style type="text/css">
  .from {
    display: flex;
    flex-direction: column;
  }

  .flex-item {
    width: 100%;
  }
</style>

<body>
  <?php if (isLoggedIn()) { ?>
    <form class="flex" action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
      <label class="flex-item">제목</label>
      <input class="flex-item" type="text" id="title" name="title" value="<?php echo (isset($title)) ? $title : ''; ?>">
      <p class="flex-item"><?php echo $title_error; ?></p>

      <label class="flex-item">내용</label>
      <textarea class="flex-item" type="text" id="desc" name="desc"><?php echo (isset($description)) ? $description : ''; ?></textarea>
      <p class="flex-item"><?php echo $desc_error; ?></p>
      <input type="submit" />
    </form>
  <?php } else { ?>
    <p>로그인 후 글을 쓸 수 있습니다!</p>
  <?php } ?>
</body>

</html>