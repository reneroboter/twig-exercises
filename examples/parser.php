<?php

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\ArrayLoader;
use Twig\Loader\ChainLoader;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

require_once __DIR__ . '/../bootstrap.php';



$twig->addExtension(new DebugExtension());
$filter = new TwigFilter('rot13', function($string) {
    return str_rot13($string);
});
$twig->addFilter($filter);

echo $twig->render('index.html', ['name' => 'René']);
*/
$twig = new Environment($loader1, [
    'cache' => __DIR__ . '/var/cache',
    'debug' => true
]);

// $twig->setLexer();
// $twig->setParser();
// $twig->setCompiler();

$stream = $twig->tokenize(new \Twig\Source('Hello {{ name }}', 'index'));


$nodes = $twig->parse($stream);

// echo $nodes . PHP_EOL;

$php = $twig->compile($nodes);

echo $php;
