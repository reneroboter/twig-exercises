<?php


namespace Certification;


use PDO;
use Twig\Loader\LoaderInterface;
use Twig\Source;

class DatabaseLoader implements \Twig\Loader\LoaderInterface
{
    protected $dbh;

    public function __construct(PDO $dbh)
    {
        $this->dbh = $dbh;
    }

    public function getSourceContext(string $name): Source
    {
        if (false === $source = $this->getValue('source', $name)) {
            throw new \Twig\Error\LoaderError(sprintf('Template "%s" does not exist.', $name));
        }

        return new \Twig\Source($source, $name);
    }

    public function exists(string $name)
    {
        return $name === $this->getValue('name', $name);
    }

    public function getCacheKey(string $name): string
    {
        return $name;
    }

    public function isFresh(string $name, int $time): bool
    {
        if (false === $lastModified = $this->getValue('last_modified', $name)) {
            return false;
        }

        return $lastModified <= $time;
    }

    protected function getValue($column, $name)
    {
        $sth = $this->dbh->prepare('SELECT ' . $column . ' FROM templates WHERE name = :name');
        $sth->execute([':name' => (string)$name]);

        return $sth->fetchColumn();
    }
}