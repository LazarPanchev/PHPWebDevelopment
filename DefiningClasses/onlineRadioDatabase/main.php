<?php

spl_autoload_register();

$nLines = intval(readline());

$songs = [];
for ($i = 0; $i < $nLines; $i++) {
    $tokens = explode(';', readline());
    $artistName = $tokens[0];
    $songName = $tokens[1];
    $songLength = $tokens[2];

    try {
        $song = new Song($artistName, $songName, $songLength);
        $songs[] = $song;
        echo "Song added." . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}

$songsNumber = count($songs);
echo "Songs added: {$songsNumber}" . PHP_EOL;
$totalSeconds = 0;
foreach ($songs as $songObj) {
    $totalSeconds += $songObj->getTotalSeconds();
}
$hours = floor($totalSeconds / 3600);
$seconds = $totalSeconds % 60;
if ($seconds > 59) {
    $seconds -= 60;
}
if ($seconds < 10) {
    $seconds = '0' . $seconds;
}
$minutes = floor($totalSeconds / 60);
if ($minutes > 59) {
    $minutes -= 60;
}
if ($minutes < 10) {
    $minutes = '0' . $minutes;
}

echo "Playlist length: {$hours}h {$minutes}m {$seconds}s";
?>