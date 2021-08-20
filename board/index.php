<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
</head>

<body>

  <?php
  require_once('lib.php');
  require_once('config.php');

  if (isset($_GET['edit'])) {
    editButton($_GET['edit']);
  }

  if (isset($_GET['delete'])) {
    deleteButton($pdo, $_GET['delete']);
  }

  if (isLoggedIn()) {
    echo '<h1>안녕하세요' . $_SESSION['username'] . '님!</h1>';
    echo "<a href='write_post.php'>글쓰기</a>";
  } else {
    echo '<h1>안녕하세요</h1>'; ?>
    <a href="register.php">회원가입</a>
    <a href="login.php">로그인</a> <?php
                              } ?>

  <?php
  //글 보여주기
  $sql = "select * from posts";
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute()) {
    $array = $stmt->fetchAll();
    if(!empty($array)){
    foreach ($array as $item) {
  ?>
      <div style="border : 1px solid black; margin-bottom: 3rem; text-align:center;">
        <button onclick="location.href='index.php?edit=<?php echo $item['id'] ?>'">수정</button>
        <button onclick="location.href='index.php?delete=<?php echo $item['id'] ?>'">삭제</button>
        <h1><?php echo $item["title"] ?></h1>
        <p style="text-align: center;"><?php echo $item["description"] ?></p>

      </div>
  <?php
    }
  } else {
    echo "<h1 style='text-align:center;'>게시물이 없습니다</h1>";
  }
  } 
  ?>
</body>

</html>