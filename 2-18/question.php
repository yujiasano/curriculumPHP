<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <title></title>
</head>
<body>
<?php
//POST送信で送られてきた名前を受け取って変数を作成
$name = $_POST['name'];
//①画像を参考に問題文の選択肢の配列を作成してください。
$ports = [80, 22, 20, 21];
$langage = ["php", "Python", "JAVA", "HTML"];
$sql = ["join", "select", "insert", "update"];
//② ①で作成した、配列から正解の選択肢の変数を作成してください
$port_answer = $ports[0];
$langage_answer = $langage[3];
$sql_answer = $sql[1];
?>
<p>お疲れ様です<!--POST通信で送られてきた名前を出力--><?php echo $name ?>さん</p>
<!--フォームの作成 通信はPOST通信で-->
<form action="answer.php" method="POST">
    <h2>①ネットワークのポート番号は何番？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
   <?php foreach($ports as $port){ ?>

      <input type="radio" value="<?php echo $port; ?>" name= "port"><?php echo $port; ?>
    <?php } ?>
    <h2>②Webページを作成するための言語は？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach($langage as $lang){ ?>

      <input type="radio" value="<?php echo $lang; ?>" name= "langage"><?php echo $lang; ?>
    <?php } ?>
    
    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach($sql as $s){ ?>

      <input type="radio" value="<?php echo $s; ?>" name= "sql"><?php echo $s; ?>
    <?php } ?>
    <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="port_answer" value="<?php echo $port_answer; ?>">
      <input type="hidden" name="langage_answer" value="<?php echo $langage_answer; ?>">
      <input type="hidden" name="sql_answer" value="<?php echo $sql_answer; ?>">
      <br>

      <input type="submit" value="回答する">
</form>

</body>
</html>
