<?php

require_once './common.php';

$userHttpHandler= new \App\Http\UserHttpHandler($template,$dataBinder);
$userHttpHandler->index();