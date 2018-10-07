<?php
$n = intval(readline());
echo createHelix($n);

function createHelix($n)
{
    $string = 'ATCGTTAGGG';
    $result = '';
    $letter = 0;
    for ($i = 0; $i < $n; $i++) {
        if ($i % 4 == 0) {
            $result .= "**" . $string[$letter++] . $string[$letter++] . "**\n";
        } elseif ($i % 2 !== 0) {
            $result .= "*" . $string[$letter++] . "--" . $string[$letter++] . "*\n";
        } else {
            $result .= $string[$letter++] . "----" . $string[$letter++] . "\n";
        }
        if (($letter) % 10 == 0) {
            $letter = 0;
        }
    }
    return $result;
}

?>