<?php

require_once __DIR__."/../src/LeetspeakTranslator.php";

class LeetspeakTranslatorTest extends PHPUnit_Framework_TestCase {

  function testLetterToThree () {
    $gen = new LeetspeakTranslator();

    $result = $gen->translate("Hey");

    $this->assertEquals("H3y", $result);
  }

  function testLetterToZero () {
    $gen = new LeetspeakTranslator();

    $result = $gen->translate("Ho Ho Ho");

    $this->assertEquals("H0 H0 H0", $result);
  }

  function testLetterToOne () {
    $gen = new LeetspeakTranslator();

    $result = $gen->translate("I am");

    $this->assertEquals("1 am", $result);
  }

  function testLetterToZee () {
    $gen = new LeetspeakTranslator();

    $result = $gen->translate("Talks");

    $this->assertEquals("Talkz", $result);
  }

  function testFullSentence () {
    $gen = new LeetspeakTranslator();

    $result = $gen->translate("Don't you love these 'String' exercises? I do!");

    $this->assertEquals("D0n't y0u l0v3 th3z3 'String' 3x3rciz3z? 1 d0!", $result);
  }

}

?>
