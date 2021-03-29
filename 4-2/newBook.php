<?php 
  require_once("db_connect.php");
  require_once("function.php");
  check_user_logged_in();

  if(isset($_POST['post'])){

    if(empty($_POST['title'])){
        echo 'タイトルが未入力です。';
    }
    if(empty($_POST['date'])){
        echo '発売日が未入力です。';
    }
    if(empty($_POST['stock_quantity'])){
      echo '在庫数を選択してください。';
    }

    if(!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['stock_quantity'])){
        $title = htmlspecialchars($_POST['title']);
        $date = $_POST['date'];
        $stock = $_POST['stock_quantity'];

        $pdo = db_connect();

        try{
            $sql = "INSERT INTO books(title, date, stock) VALUES(:title, :date, :stock)";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(':title', $title);
            $stmt -> bindParam(':date', $date);
            $stmt -> bindParam(':stock', $stock);
            $stmt -> execute();
            header("Location: stockList.php");

        }catch(PDOException $e){
            echo 'Error: '. $e -> getMessage();
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
  <title>本 登録画面</title>
</head>
<body>
<div class="mx-auto" style="width: 300px;margin-top: 50px;">
    <h2 class="stockTitle">本 登録画面</h2>
    

    <form action="" method="POST">
      <input type="text" name="title" placeholder="タイトル" class="form-control"><br>
      <input type="date" name="date" placeholder="" class="form-control"><br>

      <label>在庫数</label><br>
      <div class="row g-1">
        <div class="col-sm-9">
          <select class="form-control" name="stock_quantity" >
                <option value="">選択してください</option>
              <?php for($i=1; $i<=100; $i++){ ?>
                <option value="<?php echo $i?>"><?php echo $i ?></option>
              <?php } ?>
              ?>
            </select><br>
        </div>
      </div>
        
      <input class="btn btn-primary" id="submit" type="submit" name="post" value="登録">
      
    </form>
</div>
</body>
</html>