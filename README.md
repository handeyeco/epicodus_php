#Epicodus PHP Curriculum

Going through the Epicodus curriculum found at [learnhowtoprogram.com](https://www.learnhowtoprogram.com/php).

##Takeaways

* Setting up default values in PHP:

``` PHP
$numbers = array(1, 2, 3, false);

foreach ($numbers as $number) {
  echo $number || "undefined";
}
// "1111" type coercion?

foreach ($numbers as $number) {
  echo $number ?: "undefined";
}
// "123undefined" using PHP's ternary shorthand
```

JavaScript (without using default values):

``` JavaScript
let numbers = [1, 2, 3, false];

numbers.forEach(elem => console.log(elem || "undefined"));
// 123undefined

numbers.forEach(elem => console.log(elem ? elem : "undefined"));
// 123undefined
```

* Interesting PHP string interpolation:

``` PHP
$language = "PHP";
$comment = "$language is interesting!";

print $comment;
// "PHP is interesting!"
```

Whereas in ES6:

``` JavaScript
let language = "JavaScript",
    comment = `${language} is interesting!`;

console.log(comment);
// "JavaScript is interesting!"
```

In PHP `""` and `''` are different it seems so:

``` PHP
$language = "PHP";
$comment = '$language is interesting!'; // Note the single quotes

print $comment;
// "$language is interesting!"
```

So single quotes prevents accidental string interpolation.

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

* It's a lot easier to work with PHP than I thought it would be. A local host can be run with `php -S localhost:8000` or a shell can be opened with `php -a` to do quick PHP programming and working with forms is really easy by referencing PHP scripts with `form action="script.php"` from an HTML or PHP file.
