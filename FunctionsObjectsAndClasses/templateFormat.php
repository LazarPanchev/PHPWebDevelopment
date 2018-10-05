<?php
$input = explode(', ', readline());
$result = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$result .= "<quiz>" . PHP_EOL;
for ($i = 0; $i < count($input); $i += 2) {
    $question = $input[$i];
    $answer = $input[$i + 1];
    $result .= templateFormat($question, $answer);
}

function templateFormat($question, $answer){
    $currentXml = " <question>\n";
    $currentXml .= "  ${question}\n";
    $currentXml .= " </question>\n <answer>\n";
    $currentXml .= "  ${answer}\n";
    $currentXml .= " </answer>\n";
    return $currentXml;
}


$result .= '</quiz>';

echo $result;
?>