#Epicodus PHP Curriculum

Going through the Epicodus curriculum found at [learnhowtoprogram.com](https://www.learnhowtoprogram.com/php).

##Takeaways

* Not sure if this would be categorized as a difference of scope or of closure, but I was interested by this PHP code:

``` PHP
$number1 = 5;

function multiply ($number2) {
  return $number1 * $number2;
}

echo multiply(3);
// Error; $number1 is not in scope
```

Whereas in JavaScript:

``` JavaScript
var number1 = 5

function multiply (number2) {
  return number1 * number2;
}

console.log(multiply(3));
// 15
```

* It's a lot easier to work with PHP than I thought it would be. A local host can be run with `php -S localhost:8000` to do quick PHP programming and working with forms is really easy by referencing PHP scripts with `form action="script.php"` from an HTML or PHP file.
