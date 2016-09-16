<?php

class FindReplace {
  public $phrase;

  function __construct ($phrase) {
    $this->phrase = (string) $phrase;
  }

  function replaceAndReturn ($find, $replace) {
    $find = (string) $find;
    $replace = (string) $replace;

    $this->phrase = str_replace($find, $replace, $this->phrase);

    return $this->phrase;
  }
}

?>
