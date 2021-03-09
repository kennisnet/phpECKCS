<?php
declare(strict_types=1);

namespace Kennisnet\ECK;

class EckRecord
{
    /** @deprecated since 1.0.1 */
    const TITLE       = 'Title';
    /** @deprecated since 1.0.1 */
    const DESCRIPTION = 'Description';
    /** @deprecated since 1.0.1 */
    const INFORMATION_LOCATION = 'InformationLocation';
    /** @deprecated since 1.0.1 */
    const PUBLISHER   = 'Publisher';
    /** @deprecated since 1.0.1 */
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
    private $informationLocation = '';

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
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @deprecated Since 1.0.1
     */
    public function getLocation(): string
    {
        return $this->informationLocation;
    }

    /**
     * @deprecated Since 1.0.1
     */
    public function setLocation(string $location): void
    {
        $this->informationLocation = $location;
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

    public function getInformationLocation(): string
    {
        return $this->informationLocation;
    }

    public function setInformationLocation(string $informationLocation): void
    {
        $this->informationLocation = $informationLocation;
    }

}
