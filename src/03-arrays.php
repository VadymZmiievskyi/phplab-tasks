<?php
/**
 * The $input variable contains an array of digits
 * Return an array which will contain the same digits but repetitive by its value
 * without changing the order.
 * Example: [1,3,2] => [1,3,3,3,2,2]
 *
 * @param  array  $input
 * @return array
 */
function repeatArrayValues(array $input) {
    $arr = [];
    foreach ($input as $value) {
        $x = $value;
        while ($x > 0) {
            /*$x++;
             *array_push($arr, $value);
             */
            $arr[] = $value;
            $x--;
        }
    }
    return $arr;
}


/**
 * The $input variable contains an array of digits
 * Return the lowest unique value or 0 if there is no unique values or array is empty.
 * Example: [1, 2, 3, 2, 1, 5, 6] => 3
 *
 * @param  array  $input
 * @return int
 */
function getUniqueValue(array $input): int
{
    $new_arr = [];
    foreach ($input as $value) {
        if (count(array_keys($input, $value)) === 1) {
            array_push($new_arr, $value);
        }
    }
    if (empty($new_arr)) {
        return 0;
    }
    return min($new_arr);
}


/**
 * The $input variable contains an array of arrays
 * Each sub array has keys: name (contains strings), tags (contains array of strings)
 * Return the list of names grouped by tags
 * !!! The 'names' in returned array must be sorted ascending.
 *
 * Example:
 * [
 *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
 *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
 *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
 * ]
 *
 * Should be transformed into:
 * [
 *  'fruit' => ['apple', 'orange'],
 *  'green' => ['apple'],
 *  'vegetable' => ['potato'],
 *  'yellow' => ['orange', 'potato'],
 * ]
 *
 * @param  array  $input
 * @return array
 */

function groupByTag(array $input):array
{
    $arr=[];

    foreach ($input as $value) {
        foreach ($value['tags'] as $key => $tag_val) {
            $array[$tag_val][]=$value['name'];
        }
    }

    foreach ($arr as $key => &$value) {
        sort($value);
    }

    return $arr;
}
