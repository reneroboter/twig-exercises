<?php

class MyFilter
{
    public function rot13(string $string): string
    {
        return \str_rot13($string);
    }

    public static function srot13(string $string): string
    {
        return \str_rot13($string);
    }
}

use Twig\Environment;
use Twig\TwigFilter;

require_once __DIR__ . '/../../bootstrap.php';

$filter = new TwigFilter('rot13', function (string $string, $options) {
    if ($options === 'lower') {
        $string = strtolower($string);
    }
    return \str_rot13($string);
});

#$filter = new TwigFilter('rot13', 'str_rot13');
#$filter = new TwigFilter('rot13', ['MyFilter', 'rot13']);
#$filter = new TwigFilter('rot13', 'MyFilter::srot13');

$filter = new TwigFilter('rot13', function (Environment $env, $context, string $string) {
    var_dump($env->getCharset());
    var_dump($context);
    return \str_rot13($string);
}, ['needs_context' => true, 'needs_environment' => true]);

$twig->addFilter($filter);

$filter = new TwigFilter('nl2br', 'nl2br', ['is_safe' => ['html']]);

echo $twig->render('filters.html');

