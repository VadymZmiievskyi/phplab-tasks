<?php
/**
 * /
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param array $airports
 * @return string[]
 */
function getUniqueFirstLetters(array $airports)
{
    $lettersAirports = [];
    foreach ($airports as $airport) {
        $lettersAirports[] = ucfirst($airport['name'][0]);
    }

    $result = array_unique($lettersAirports);
    sort($result);


    return $result;
}


function filteringAirportsByFirstLetter($airports, $letter)
{
    $newArr = [];
    foreach ($airports as $air) {
        if ($air['name'][0] === $letter) {
            $newArr[] = $air;
        }
    }


    return $newArr;
}

function filteringAirportsByState($airports, $state)
{
    return array_filter($airports, function ($k) use ($state) {
        return $k['state'] == $state;
    });
}


function sortTableInfoByColumn($airports, $column)
{
    $stateColumn = array_column($airports, $column);
    array_multisort($stateColumn, SORT_ASC, $airports);

    return $airports;
}

