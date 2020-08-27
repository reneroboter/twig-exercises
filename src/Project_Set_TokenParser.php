<?php

declare(strict_types=1);

namespace Certification;

use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

class Project_Set_TokenParser extends AbstractTokenParser
{

    public function parse(Token $token)
    {
        $parser = $this->parser;
        $stream = $parser->getStream();

        $name = $stream->expect(Token::NAME_TYPE)->getValue();
        $stream->expect(Token::OPERATOR_TYPE, '=');
        $value  = $parser->getExpressionParser()->parseExpression();
        $stream->expect(Token::BLOCK_END_TYPE);

        return new Project_Set_Node($name, $value, $token->getLine(), $this->getTag());
    }

    public function getTag()
    {
        return 'set';
    }
}