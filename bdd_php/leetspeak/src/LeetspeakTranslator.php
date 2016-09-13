<?php

class LeetspeakTranslator {
  function translate ($phrase) {
    $letters = str_split($phrase);
    $letters = array_map(function ($elem) {
      if ($elem == "e") {
        return "3";
      } elseif ($elem == "o") {
        return "0";
      } elseif ($elem == "I") {
        return "1";
      } elseif ($elem == "s") {
        return "z";
      } else {
        return $elem;
      }
    }, $letters);

    return implode("", $letters);
  }
}

?>
