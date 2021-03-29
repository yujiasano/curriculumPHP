<?php 
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

$pdo = db_connect();

try{
  $sql = "SELECT * FROM books";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
}catch(PDOException $e){
  echo "Error: ". $e->getMessage();
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
  <title>在庫一覧</title>
</head>
<body>
<div class="mx-auto" style="width: 500px;margin-top: 50px;">
  <h2 class="stockTitle">在庫一覧画面</h2>
  <a class="btn btn-primary" id="new" href="newBook.php" role="button" >新規登録</a>
  <a class="btn btn-secondary" id="new" href="logout.php" role="button" >ログアウト</a>

<table class="table table-bordered">
  <tr class="table-active">
    <th scope="col">タイトル</th>
    <th scope="col">発売日</th>
    <th scope="col">在庫数</th>
    <th scope="col"></th>
  </tr>  

 <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
  <tr class="stock">
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['stock'] ?></td>
    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>">削除</a></td>
  </tr>  
<?php } ?>
</table>
  
</div>

  
</body>
</html>