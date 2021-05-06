<?php

namespace App\Model;

class FormData
{
    private string $title;

    private string $description;

    private string $author;

    public function __construct(string $title, string $description, string $author)
    {
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}
