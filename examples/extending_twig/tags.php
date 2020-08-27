<?php

use Certification\Project_Set_TokenParser;

require_once __DIR__ . '/../../bootstrap.php';

$twig->addTokenParser(new Project_Set_TokenParser);

echo $twig->render('tags.html');