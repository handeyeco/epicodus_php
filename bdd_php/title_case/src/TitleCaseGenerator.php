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
    $input_array = explode(" ", $input_title);
    $output_array = array_map(array($this, "wordMap"), $input_array);
    return implode(" ", $output_array);
  }
}

?>
