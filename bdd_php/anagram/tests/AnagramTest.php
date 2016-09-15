<?php

require_once __DIR__."/../src/Anagram.php";

class AnagramTest extends PHPUnit_Framework_TestCase {

  function test_oneWord () {
    $anagram = new Anagram("acres");

    $result = $anagram->returnAnagramArray("cares");

    $this->assertEquals(array("cares"), $result);
  }

  function test_multiplePositiveResults () {
    $anagram = new Anagram("acres");

    $result = $anagram->returnAnagramArray("races, cares");

    $this->assertEquals(array("races", "cares"), $result);
  }

  function test_filterNonAnagrams () {
    $anagram = new Anagram("acres");

    $result = $anagram->returnAnagramArray("races, bro");

    $this->assertEquals(array("races"), $result);
  }

  function test_noMatches () {
    $anagram = new Anagram("acres");

    $result = $anagram->returnAnagramArray("throw, crow, bro");

    $this->assertEquals(array(), $result);
  }

  function test_falsePositives () {
    $anagram = new Anagram("acres");

    $result = $anagram->returnAnagramArray("ears");

    $this->assertEquals(array(), $result);
  }

}

?>
