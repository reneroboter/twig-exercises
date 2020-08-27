<?php

use Twig\Extra\Html\HtmlExtension;

require_once __DIR__ . '/../bootstrap.php';

$twig->addExtension(new HtmlExtension);

echo $twig->render('functions.html');