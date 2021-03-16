<?php 
  include_once("getData.php");
  $getData = new getData();
  $usersData = $getData->getUserData();
  $postData = $getData->getPostData();

  $fullName = $usersData['last_name'].$usersData['first_name'];
  $lastLogin = $usersData['last_login'];

  function getCategory($number){
    if($number === '1'){
      return '食事';
    }else if($number === '2'){
      return '旅行';
    }else{
      return 'その他';
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>checkTest3</title>
</head>
<body>
<header>
    <div class="header-left">
        <img src="yilogo.png" alt="ロゴ">
    </div>
    <div class="header-right">
        <div class="header-up">ようこそ<?php echo $fullName; ?></div>
        <div class="header-down">最終ログイン日:<?php echo $lastLogin; ?></div>
    </div>
</header>
<div class="contents">

    <table>
      <thead>
        <tr>
            <th>記事ID</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>本文</th>
            <th>投稿日</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($postData as $p){ ?>
          <tr>
              <td><?php echo $p['id']; ?></td>
              <td><?php echo $p['title']; ?></td>
              <td><?php echo getCategory($p['category_no']); ?></td>
              <td><?php echo $p['comment']; ?></td>
              <td><?php echo $p['created']; ?></td>
          </tr>
          <?php } ?>
      </tbody>
    </table>

</div>

<footer>Y&I gronp.inc</footer>
  
</body>
</html>