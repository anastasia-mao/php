<?php
require_once 'vendor/autoload.php';


$loader = new Twig_Loader_Filesystem('Templates');
$twig = new Twig_Environment($loader);

//логика какую именно страницу надо вернуть и с какими данными в load
$template = $twig->load('edit.html');
echo $template->render(array());