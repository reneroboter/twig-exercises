<?php

require_once __DIR__ . '/../../bootstrap.php';

$twig->addGlobal('text', 'Hello World');
echo $twig->render('globals.html');