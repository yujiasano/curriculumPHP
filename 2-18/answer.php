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
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$name = $_POST['name'];

$port = $_POST['port'];
$langage = $_POST['langage'];
$sql = $_POST['sql'];

$port_answer = $_POST['port_answer'];
$langage_answer = $_POST['langage_answer'];
$sql_answer = $_POST['sql_answer'];
//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function decision($answer, $correct_answer){
  if($answer==$correct_answer){
    echo "正解!";
  }else{
    echo "残念・・・";
  }
}
?>
<p><!--POST通信で送られてきた名前を表示--><?php echo $name ?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php decision($port, $port_answer); ?>

<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php decision($langage, $langage_answer); ?>

<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php decision($sql, $sql_answer); ?>
</body>
</html>
