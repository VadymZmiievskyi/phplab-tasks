<?php
/**
 * The $input variable contains text in snake case (i.e. hello_world or this_is_home_task)
 * Transform it into camel cased string and return (i.e. helloWorld or thisIsHomeTask)
 * @see http://xahlee.info/comp/camelCase_vs_snake_case.html
 *
 * @param  string  $input
 * @return string
 */
function snakeCaseToCamelCase(string $input, $capitalizeFirstCharacter = true)
{

    $str = str_replace('_', '', ucwords($input, '_'));

    if ($capitalizeFirstCharacter) {
        $str = lcfirst($str);
    }

    return $str;
}

echo snakeCaseToCamelCase('hello_world');

/**
 * The $input variable contains multibyte text like 'ФЫВА олдж'
 * Mirror each word individually and return transformed text (i.e. 'АВЫФ ждло')
 * !!! do not change words order
 *
 * @param  string  $input
 * @return string
 */
function mirrorMultibyteString(string $input, $encoding='UTF-8')
{
    $arr_input = explode(" ", $input);

    $out = "";
    foreach($arr_input as $value){

        $out .= mb_convert_encoding( strrev( mb_convert_encoding($value, 'UTF-16BE', $encoding) ), $encoding, 'UTF-16LE')." ";

    }
    return rtrim($out);

}
echo mirrorMultibyteString("Привет Мир");

/**
 * My friend wants a new band name for her band.
 * She likes bands that use the formula: 'The' + a noun with first letter capitalized.
 * However, when a noun STARTS and ENDS with the same letter,
 * she likes to repeat the noun twice and connect them together with the first and last letter,
 * combined into one word like so (WITHOUT a 'The' in front):
 * dolphin -> The Dolphin
 * alaska -> Alaskalaska
 * europe -> Europeurope
 * Implement this logic.
 *
 * @param  string  $noun
 * @return string
 */
function getBrandName(string $noun)
{
    $f_let=substr(trim($noun),0,1);

    $preg=preg_match("/(^$f_let{1})(\w*)($f_let$)/u",$noun);

    $input='';

    if($preg){

        $input=preg_replace_callback("/(^$f_let{1})(\w*)/",'change',$noun);

    }else{

        $input='The '.ucfirst($noun);

    }

    return $input;

}



