<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 27.9.2018 г.
 * Time: 12:26 ч.
 */

$input = readline();
$mapTeamTotalPoints=[];
$map = [];
$result=[];

while ($input !== "Result") {
    $tokens = explode('|', $input);
    $tokens = array_map('trim', $tokens);
    $team = '';
    $player = '';
    $points = intval($tokens[2]);

    $tokens[0] = str_replace('@', '', $tokens[0]);
    $tokens[0] = str_replace('%', '', $tokens[0]);
    $tokens[0] = str_replace('&', '', $tokens[0]);
    $tokens[0] = str_replace('$', '', $tokens[0]);
    $tokens[0] = str_replace('*', '', $tokens[0]);

    $tokens[1] = str_replace('@', '', $tokens[1]);
    $tokens[1] = str_replace('%', '', $tokens[1]);
    $tokens[1] = str_replace('&', '', $tokens[1]);
    $tokens[1] = str_replace('$', '', $tokens[1]);
    $tokens[1] = str_replace('*', '', $tokens[1]);

    for ($i = 0; $i < strlen($tokens[0]); $i++) {
        $currChar = $tokens[0][$i];
        if (!ctype_upper($currChar)) {
            $player = $tokens[0];
            $team = $tokens[1];
            break;
        }
    }

    if ($player === '') {
        $player = $tokens[1];
        $team = $tokens[0];
    }

    if (!array_key_exists($team, $map)) {
        $map[$team] = [];
    }
    $map[$team][$player] = $points;

    $input = readline();
}

foreach ($map as $team=>$player){
    if(!array_key_exists($team,$mapTeamTotalPoints)){
        $mapTeamTotalPoints[$team]=0;
    }
    $maxPoints=0;
    foreach ($map[$team] as $player=>$points){
        $mapTeamTotalPoints[$team]+=$points;

        if($points>$maxPoints){
            $maxPoints=$points;
            $result[$team]=$player;
        }
    }
}

array_multisort($mapTeamTotalPoints,SORT_DESC);

foreach ($mapTeamTotalPoints as $team=>$points){
    echo "$team => $points" . PHP_EOL;
    printf("Most points scored by %s".PHP_EOL,$result[$team]);
}

?>