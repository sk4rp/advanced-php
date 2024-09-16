<?php

class RemoveAttributes implements Iterator
{
    protected string $html;
    protected string $processedHtml;
    protected int $position = 0;
    protected array $elements = [];

    public function __construct($html)
    {
        $this->html = $html;

        $this->processedHtml = preg_replace(
            '/<meta[^>]*(name="description"|name="keywords")[^>]*>|<title[^>]*>.*?<\/title>/i',
            '',
            $html
        );

        $this->elements = str_split($this->processedHtml);
    }

    public function current(): mixed
    {
        return $this->elements[$this->position];
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->elements[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
