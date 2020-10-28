<?php
declare(strict_types=1);

namespace Kennisnet\ECK;

class EckRecord
{
    const TITLE       = 'Title';
    const DESCRIPTION = 'Description';
    const LOCATION    = 'InformationLocation';
    const PUBLISHER   = 'Publisher';
    const AUTHORS     = 'Authors';

    /**
     * @var string
     */
    private $recordId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var string
     */
    private $location = '';

    /**
     * @var string
     */
    private $publisher = '';

    /**
     * @var string[]
     */
    private $authors = [];

    public function __construct(string $recordId, string $title)
    {
        $this->recordId = $recordId;
        $this->title    = $title;
    }

    public function getRecordId(): string
    {
        return $this->recordId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setDescription(string $description): void
    {
        if (null !== $description) {
            $this->description = $description;
        }
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
    }

    /**
     * @return string[]
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @param string[] $authors
     */
    public function setAuthors(array $authors): void
    {
        $this->authors = $authors;
    }

    public function addAuthor(string $author): void
    {
        if (!in_array($author, $this->authors)) {
            $this->authors[] = $author;
        }
    }

}