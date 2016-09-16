<?php

class RepeatCounter {
  function countRepeats ($needle, $haystack) {
    $needle = strtolower($needle);
    $word_count = array();
    $haystack = explode(" ", strtolower($haystack));

    foreach ($haystack as $word) {
      if (empty($word_count[$word])) {
        $word_count[$word] = 1;
      } else {
        $word_count[$word]++;
      }
    }

    return isset($word_count[$needle]) ? $word_count[$needle] : 0;
  }
}

?>
