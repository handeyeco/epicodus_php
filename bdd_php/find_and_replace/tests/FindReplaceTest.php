<?php

require_once __DIR__."/../src/FindReplace.php";

class FindReplaceTest extends PHPUnit_Framework_TestCase {

  function test_singleWords () {
    $phrase = new FindReplace("cat");

    $result = $phrase->replaceAndReturn("cat", "dog");

    $this->assertEquals("dog", $result);
  }

  function test_replaceWordInSentence () {
    $phrase = new FindReplace("I love my cat");

    $result = $phrase->replaceAndReturn("cat", "dog");

    $this->assertEquals("I love my dog", $result);
  }

  function test_replaceWordsInSentence () {
    $phrase = new FindReplace("I love my cat");

    $result = $phrase->replaceAndReturn("cat", "dog and parrot");

    $this->assertEquals("I love my dog and parrot", $result);
  }

  function test_replacePartialsInWord () {
    $phrase = new FindReplace("cat");

    $result = $phrase->replaceAndReturn("c", "b");

    $this->assertEquals("bat", $result);
  }

  function test_replacePartialsInSentence () {
    $phrase = new FindReplace("I am walking my cat to the cathedral");

    $result = $phrase->replaceAndReturn("cat", "dog");

    $this->assertEquals("I am walking my dog to the doghedral", $result);
  }

}

?>
