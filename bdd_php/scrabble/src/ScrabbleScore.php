<?php

class ScrabbleScore {
  function returnLetterScore ($letter) {
    $letter = strtolower($letter);

    if (preg_match('/[qz]/', $letter)) {
      return 10;
    } elseif (preg_match('/[jx]/', $letter)) {
      return 8;
    } elseif ($letter == 'k') {
      return 5;
    } elseif (preg_match('/[fhvwy]/', $letter)) {
      return 4;
    } elseif (preg_match('/[bcmp]/', $letter)) {
      return 3;
    } elseif (preg_match('/[dg]/', $letter)) {
      return 2;
    } else {
      return 1;
    }
  }

  function getScore ($word) {
    $word_array = str_split($word);
    $result = 0;

    foreach ($word_array as $letter) {
      $result += $this->returnLetterScore($letter);
    }

    return $result;
  }
}

?>
