<?php

echo "bismillah";



$number1 = 20;
$number2 = 30;

$add = $number1 + $number2;
$sub = $number1 - $number2;
$mul = $number1 * $number2;
$div = $number1 / $number2;
echo " adding" . $add . "<br>";
echo " subtracting" . $sub . "<br>";
echo " multiplying" . $mul . "<br>";
echo " dividing" . $div . "<br>";






echo "<h1> Assignmet Operator</h1>";


$value = 100;


$num = $value;


echo "default value " . $num . "<br>";


// $num =$num +10
$num /= 10;

echo "by adding" . $num . "<br>";


$christible = 100;
echo "default value " . $christible . "<br>";
echo "increment " . ++$christible . "<br>";
echo "final value " . $christible . "<br>";




echo var_dump(1 == 7) . "<br>";
echo var_dump(1 != 7) . "<br>";
echo var_dump(1 < 7) . "<br>";
echo var_dump(1 > 7) . "<br>";



// && || !

$value3 = 1;
$value2 = 2;
echo var_dump($value2 && $value3);

$numn=-10;

if ($numn > 0) {
    echo "positive";
} else {
    echo "negative";
}
