<?php

require 'vendor/autoload.php';

$app = new \App\Bootstrap($_GET);
$app->run();
