<?php 
require_once 'lib.php';
?>

<!DOCTYPE html>
<html>
  <body>
    <?php if(isLoggedIn()) { ?>
    <h1>안녕하세요, <?php echo $_SESSION['username']; ?> 님</h1>
    <a href="index.php">홈으로</a>
    <?php } else {?>
      <h5>로그인이 필요합니다</h5>
    <?php }?>
  </body>
</html>