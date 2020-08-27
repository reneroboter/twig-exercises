<?php

use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\Loader\ChainLoader;
use Twig\Loader\FilesystemLoader;

require_once __DIR__ . '/vendor/autoload.php';


$loader1 = new ArrayLoader([
    'index' => 'Hello {{ name }}!',
]);
$loader2 = new FilesystemLoader(__DIR__ . '/templates');

$loader = new ChainLoader([$loader1, $loader2]);

$twig = new Environment($loader, [
    'cache' => __DIR__ . '/var/cache',
    'debug' => true
]);