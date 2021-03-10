<?php
  
  $x = 5.2;
  echo ceil($x);
  echo "<br>";
// -----------------------
  $x = 5.9;
  echo floor($x);
  echo "<br>";
// -----------------------
  $x = 5.5;
  echo round($x);
  echo "<br>";
// -----------------------
  echo pi();
  echo "<br>";
    
    function circleArea($r) {
        $circle_area = $r * $r * pi();
        echo $circle_area; 
    }
    
    circleArea(5);
    echo "<br>";
// -----------------------
    echo mt_rand(1, 100);
    echo "<br>";
// -----------------------
  $str = "hogehoge";
  echo strlen($str);
  echo "<br>";
// -----------------------
$str = "asano";
echo strpos($str, "a");
echo "<br>";
// -----------------------
$str = "yoneyama";
echo substr($str, -4, 3);
echo "<br>";
// -----------------------
$str = "yoneyama";
echo str_replace("neya", "NEYA", $str);
echo "<br>";
// -----------------------
$str = "I am Yoneyama";
echo str_replace(" ", "", $str);
echo "<br>";
// -----------------------
$age = 27;
$name = "浅野";
printf("%sの年齢は%d歳です", $name, $age);

echo "<br>";
// -----------------------
$introduction = sprintf("%sの年齢は%d歳です", $name, $age);
echo $introduction;


?>