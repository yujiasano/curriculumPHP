<?php 
$members = ["tanaka", "sasaki", "kimura", "yoshida", "uchida", "aaaa", "bbbb", "cccc"];
echo count($members);
echo "<br>";
// -----------------------
$members = ["tanaka", "sasaki", "kimura", "yoshida", "aoki","uchida"];
sort($members);
var_dump($members);
echo "<br>";
// -----------------------
$numbers = [26, 35, 17, 67, 2, 45];
sort($numbers);
var_dump($numbers);
echo "<br>";
// -----------------------
$members = ["tanaka", "sasaki", "kimura", "yoshida", "uchida"];
var_dump(in_array("saito", $members));
echo "<br>";
// -----------------------
$numbers = [ 1, 2, 3, 4, 5];
if (in_array( 3, $numbers)) {
    echo "３が入ってるよ！";
} else {
    echo "３は入っていないよ！";
}
echo "<br>";
// -----------------------
$members = ["tanaka", "sasaki", "kimura", "yoshida", "uchida"];
$atstr = implode("＆", $members);
var_dump($atstr);
echo "<br>";
// -----------------------
$re_members = explode("＆", $atstr);
var_dump($re_members);
echo "<br>";
// -----------------------
$str = "赤,青,緑,黄,茶";
$array = explode(",",$str);
var_dump($array);

?>