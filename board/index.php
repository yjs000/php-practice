<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
  </head>

  <body>  
    
    <?php 
    require_once('lib.php');
    if(isLoggedIn()){
      echo '<h1>안녕하세요' . $_SESSION['username'] . '님!</h1>';
      echo "<a href='write_post.php'>글쓰기</a>";
    } else {
      echo '<h1>안녕하세요</h1>';?>
        <a href="register.php">회원가입</a>
        <a href="login.php">로그인</a>     
    <?php
    } ?>
    
    
   
    
  </body>
</html>
