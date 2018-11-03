<?php
use \App\Service\UserService;
require_once 'common.php';

$userHttpHandler->login($userService,$_POST);