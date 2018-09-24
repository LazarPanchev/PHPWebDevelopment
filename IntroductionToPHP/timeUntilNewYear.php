<?php
$today = readline();
$tokens=explode(' ', $today);
$firstPartTokens=explode('-',$tokens[0]);
$secondPartTokens=explode(':',$tokens[1]);
$day=$firstPartTokens[0];
$month=$firstPartTokens[1];
$year=$firstPartTokens[2];
$hour=$secondPartTokens[0];
$minutes=$secondPartTokens[1];
$seconds=$secondPartTokens[2];

$newYear = mktime(0, 0, 0, 1, 1, $year + 1);
$todaySec=mktime($hour,$minutes,$seconds,$month,$day,$year);
$diff =  $newYear - $todaySec ;
if(date("I", $todaySec) > 0) {
    $diff -= 3600;
}
echo "Hours until new year : " . floor($diff / 3600) . "\n";
echo "Minutes until new year : " . floor($diff / 60) . "\n";
echo "Seconds until new year : $diff\n";
echo "Days:Hours:Minutes:Seconds " . floor($diff / 86400) . ":" . date("H:i:s", $diff);
?>