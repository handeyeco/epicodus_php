<?php

class Anagram {
  public $base_word;

  function __construct ($word) {
    $this->base_word = $word;
  }

  function getBaseWordLetterArray () {
    $word = $this->base_word;
    $array = str_split($word);
    sort($array);
    return $array;
  }

  function returnAnagramArray ($input) {
    $input_array = explode(", ", $input);
    $result = array();

    foreach ($input_array as $word) {
      $array = str_split($word);
      sort($array);
      $base = $this->getBaseWordLetterArray();

      if ($base === $array) {
        array_push($result, $word);
      }
    }

    return $result;
  }
}

?>
