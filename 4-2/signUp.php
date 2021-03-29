<?php 
  require_once('db_connect.php');

  session_start();

  if(isset($_POST["signUp"])){

    if(empty($_POST['name'])){
      echo '名前が未入力です。';
      echo '<br>';
    }

    if(empty($_POST['password'])){
      echo 'パスワードが未入力です。';
      echo '<br>';
    }
    
    if(!empty($_POST['name']) && !empty($_POST['password'])){

      $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
      $pass = htmlspecialchars($_POST['password'], ENT_QUOTES);
  
      $pdo = db_connect();
  
    try{
      $sql = "INSERT INTO users(name, password) VALUES( :name, :password)";
      $password_hash = password_hash($pass, PASSWORD_DEFAULT);
      $stmt = $pdo -> prepare($sql);
      $stmt -> bindParam(':name', $name);
      $stmt -> bindParam(':password', $password_hash);
      $stmt ->execute();
      
      header("Location: signUp_done.php");
  
  
    }catch(PDOException $e){
      echo 'Error: '. $e->getMessage();
      die();
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
  <title>ユーザー登録画面</title>
</head>
<body>
<div class="mx-auto" style="width: 500px;margin-top: 50px;">
    <h1 class="inline">ユーザー登録画面</h1>
    

    <form action="" method="POST">
      <input type="text" name="name" placeholder="ユーザー名" class="form-control"><br>
      <input type="password" name="password" placeholder="パスワード" class="form-control"><br>

      <input class="btn btn-primary" name="signUp" id="submit" type="submit" value="新規登録">
      
    </form>
</div>
</body>
</html>