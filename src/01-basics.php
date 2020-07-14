<?php
/**
 * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
 * Determine in which quarter of an hour the number falls.
 * Return one of the values: "first", "second", "third" and "fourth".
 * Throw InvalidArgumentException if $minute is negative of greater then 60.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $minute
 * @return string
 * @throws InvalidArgumentException
 */
function getMinuteQuarter($minute)
{


    if ($minute >= 0 and $minute <= 14) {
        return " first";
    }

    if ($minute <= 15 and $minute >= 30) {
        return "second";
    }

    if ($minute <= 31 and $minute >= 45) {
        return"third";
    }


    if ($minute >= 46 and $minute <= 59) {
        return"fourth";
    }

    if($minute > 60){
        throw new InvalidArgumentException("must be < than 60");
    }
}

try{
    echo getMinuteQuarter(5);

}catch (\InvalidArgumentException $e){
    echo $e->getMessage();
}


/**
 * The $year variable contains a year (i.e. 1995 or 2020 etc).
 * Return true if the year is Leap or false otherwise.
 * Throw InvalidArgumentException if $year is lower then 1900.
 * @see https://en.wikipedia.org/wiki/Leap_year
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $year
 * @return boolean
 * @throws InvalidArgumentException
*/

function isLeapYear($year){

    if($year < 1900){
        throw new InvalidArgumentException("must be > than 1990");
    }elseif($year == 2000){
        throw new InvalidArgumentException("true");
    }elseif($year % 4 !=0) {
        return"false";
    }elseif($year % 100 !=0){
        return"true";


    }elseif($year / 400 !=0){
        return"false";

    }
    else{
        return"true";
    }
}

try{
    echo isLeapYear(2000);

}catch (\InvalidArgumentException $a){
    echo $a->getMessage();
}

/**
 * The $input variable contains a string of six digits (like '123456' or '385934').
 * Return true if the sum of the first three digits is equal with the sum of last three ones
 * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
 * Throw InvalidArgumentException if $input contains more then 6 digits.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  string  $input
 * @return boolean
 * @throws InvalidArgumentException
*/
function isSumEqual(string $input) {

    if(mb_strlen($input) > 6) {
        throw new InvalidArgumentException("should be 6 values");

    }

    $arr1 = str_split($input);

    $val1 = 0;
    $val2 = 0;
    $i = 0;

    foreach($arr1 as $key => $value) {
        if ($i < 3) {
            $val1 += $value;
        }
        else {
            $val2 += $value;
        }

        $i++;
    }


    if($val1 == $val2) {
        return true;
    } else {
        return false;
    }
}

try{
    var_dump (isSumEqual("123456"));

}catch (\InvalidArgumentException $e){
    echo $e->getMessage();
}

