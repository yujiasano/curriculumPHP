<?php 
  session_start();

  $_SESSION = array();

  session_destroy();
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel ="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <title>ログアウト画面</title>
</head>
<body>
    <div class="mx-auto" style="width: 300px;margin-top: 50px;">
        <h1>ログアウトしました</h1>
        <a class="btn btn-info" id="new" href="login.php" role="button" >ログイン画面に戻る</a>
    </div>  
</body>
</html> 