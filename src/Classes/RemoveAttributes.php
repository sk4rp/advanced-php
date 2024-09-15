<?php

class RemoveAttributes implements Iterator
{
    protected string $html;
    protected int $position = 0;
    protected array $elements = [];

    public function __construct($html)
    {
        $this->html = $html;
        $this->elements = preg_split('/(<meta[^>]*>|<title[^>]*>.*?<\/title>|\s+title="[^"]*")/i', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
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