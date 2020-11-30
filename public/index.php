<?php

require __DIR__.'/../vendor/autoload.php';

const DEFAULT_APP = 'Frontend';
if(!isset($_GET['app']) || !file_exists(__DIR__.'/../src/apps/'.$_GET['app'])) {
     $_GET['app'] = DEFAULT_APP;
}

$appClass  = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
$app = new $appClass;

$app->run();