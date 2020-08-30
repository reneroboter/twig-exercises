<?php

use Twig\Extra\Html\HtmlExtension;
use Twig\Extra\Intl\IntlExtension;

require_once __DIR__ . '/../bootstrap.php';

$twig->addExtension(new IntlExtension());
$twig->addExtension(new HtmlExtension());

echo $twig->render('intl.twig.html');