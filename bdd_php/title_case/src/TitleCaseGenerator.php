<?php

class TitleCaseGenerator {
  function wordMap($input_word) {
    if ($input_word == "or" || $input_word == "and" || $input_word == "but") {
      return $input_word;
    } else {
      return ucfirst($input_word);
    }
  }

  function makeTitleCase($input_title) {
    return implode(" ", array_map("TitleCaseGenerator::wordMap", explode(" ", $input_title)));
  }
}

?>
