<?php 
require_once('db_connect.php');

session_start();

if(!empty($_POST)){
  if(empty($_POST['name'])){
    echo '名前が未入力です。';
  }

  if(empty($_POST['password'])){
    echo 'パスワードが未入力です。';
  }

  if(!empty($_POST['name']) && !empty($_POST['password'])){
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $pass = htmlspecialchars($_POST['password']);

    $pdo = db_connect();
    try{
      $sql = "SELECT * FROM users WHERE name = :name";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":name", $name);
      $stmt->execute();

    }catch(PDOException $e){
      echo "Error: ". $e->getMessage();
      die();
    }

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      if(password_verify($pass, $row['password'])){
        $_SESSION["user_id"] = $row['id'];
        $_SESSION["user_name"] = $row['name'];
        header("Location: stockList.php");
        exit;
      }else{
        echo 'パスワードに誤りがあります。';
      }
    }else{
      echo 'ユーザー名かパスワードに誤りがあります。';
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel ="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <title>ログイン画面</title>
</head>
<body>
<div class="mx-auto" style="width: 500px;margin-top: 50px;">
    <h1 class="inline">ログイン画面</h1>
    <a class="btn btn-info" id="new" href="signUp.php" role="button" >新規ユーザー登録</a>

    <form action="" method="POST">

      <input type="text" name="name" placeholder="ユーザー名" class="form-control"><br>

      <input type="password" name="password" placeholder="パスワード" class="form-control"><br>

      <input class="btn btn-primary" id="submit" type="submit" value="ログイン">
      
    </form>
</div>
</body>
</html>