<?php 

$test_File = "test2.txt";
// $contents = "こんにちは！";

if (is_readable($test_File)) {
    
    $fp = fopen($test_File, "r");

    while($line = fgets($fp)){
      echo $line.'<br>';
    }

    fclose($fp);

    // echo "finish writing!!";

} else {
    
    echo "not readable!";
    exit;
}


?>