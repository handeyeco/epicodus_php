<?php

require_once "src/TitleCaseGenerator.php";

class TitleCaseGeneratorTest extends PHPUnit_Framework_TestCase {

  function test_makeTitleCase_oneWord() {
      //Arrange
      $test_TitleCaseGenerator = new TitleCaseGenerator;
      $input = "beowulf";

      //Act
      $result = $test_TitleCaseGenerator->makeTitleCase($input);

      //Assert
      $this->assertEquals("Beowulf", $result);
  }

  function test_makeTitleCase_multipleWords() {
    //Arrange
    $test_TitleCaseGenerator = new TitleCaseGenerator;
    $input = "the little mermaid";

    //Act
    $result = $test_TitleCaseGenerator->makeTitleCase($input);

    //Assert
    $this->assertEquals("The Little Mermaid", $result);
  }

  function test_makeTitleCase_orExemption() {
    //Arrange
    $test_TitleCaseGenerator = new TitleCaseGenerator;
    $input = "bourbon or scotch";

    //Act
    $result = $test_TitleCaseGenerator->makeTitleCase($input);

    //Assert
    $this->assertEquals("Bourbon or Scotch", $result);
  }

  function test_makeTitleCase_andExemption() {
    //Arrange
    $test_TitleCaseGenerator = new TitleCaseGenerator;
    $input = "fox and hound";

    //Act
    $result = $test_TitleCaseGenerator->makeTitleCase($input);

    //Assert
    $this->assertEquals("Fox and Hound", $result);
  }

  function test_makeTitleCase_butExemption() {
    //Arrange
    $test_TitleCaseGenerator = new TitleCaseGenerator;
    $input = "yes but no";

    //Act
    $result = $test_TitleCaseGenerator->makeTitleCase($input);

    //Assert
    $this->assertEquals("Yes but No", $result);

  }

}

?>
