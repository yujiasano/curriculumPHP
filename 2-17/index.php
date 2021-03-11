<?php 
$total = 0;
for($i = 1; $i <= 40; $i++){
  
  $dice = mt_rand(1, 6);
  echo $i."回目 = ".$dice;
  echo "<br>";
  $total += $dice;
  
  if($total >= 40){
    echo "合計".$i."回でゴールしました";
    break;
  }
}


echo "<br>";
echo "--------------------------------------------------------------";
echo "<br>";

date_default_timezone_set('Asia/Tokyo');
$hour = intval(date('H'));
echo "今{$hour}時台です";

echo "<br>";
if($hour >= 5 && $hour <= 10){
  echo "おはようございます。";
}elseif($hour >= 11 && $hour <= 17){
  echo "こんにちは。";
}else {
  echo "こんばんは。";
}




?>