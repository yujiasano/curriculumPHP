<?php 
  function getVolume($length, $width, $height ){
    $volume = $length * $width * $height;
    return $volume;
  }

  echo getVolume(2, 3, 4);
?>