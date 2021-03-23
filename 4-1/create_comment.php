<?php
  require_once('db_connect.php');
  require_once('function.php');
  check_user_logged_in();

  if(!empty($_POST)){
    $post_id = $_POST['post_id'];

    if(empty($_POST['name'])){
      echo '名前が未入力です。';
    }else if(empty($_POST['content'])){
      echo 'コメントが未入力です。';
    }
    
    if(!empty($_POST['name']) && !empty($_POST['content'])){

      $name = $_POST['name'];
      $content = $_POST['content'];
      $pdo = db_connect();
      try{
        $sql = "INSERT INTO comments (post_id, name, content) VALUES(:post_id, :name, :content)";

        $stmt = $pdo->prepare($sql);
        $stmt -> bindParam(":post_id", $post_id);
        $stmt -> bindParam(":name", $name);
        $stmt -> bindParam(":content", $content);
        $stmt -> execute();

        header("Location: detail_post.php?id=".$post_id);
        exit;
      }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
        die();
      }
    }
  }else{
    $post_id = $_GET['post_id'];
    redirect_main_unless_parameter($post_id);
  }
?>
<!DOCTYPE html>
<html>
<head> 
<title>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>コメント</h1>
<form action="" method="POST">
  <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
  投稿者：<br>
  <input type="text" name="name"> <br>
  コメント：<br>
  <input type="text" name="content" style="width: 200px;height: 100px;"> <br>
  <input type="submit" value="submit">
</form>
<a href="detail_post.php?id=<?php $post_id; ?>">記事詳細に戻る</a>
</body>
</html>