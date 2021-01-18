<?php


require '../vendor/autoload.php';
use League\Plates\Engine;
$template = new Engine('../views');
echo $template->render('pages2');