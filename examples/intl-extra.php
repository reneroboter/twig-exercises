<?php

use Twig\Extra\Intl\IntlExtension;

require_once __DIR__ . '/../bootstrap.php';

$twig->addExtension(new IntlExtension());