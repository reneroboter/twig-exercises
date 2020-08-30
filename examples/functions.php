<?php

use Twig\Extension\StringLoaderExtension;
use Twig\Extra\CssInliner\CssInlinerExtension;
use Twig\Extra\Html\HtmlExtension;

require_once __DIR__ . '/../bootstrap.php';

$twig->addExtension(new HtmlExtension);
$twig->addExtension(new StringLoaderExtension);
$twig->addExtension(new CssInlinerExtension());

#echo $twig->render('functions.html');
echo $twig->render('functions2.html');