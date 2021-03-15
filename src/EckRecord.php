<?php
declare(strict_types=1);

namespace Kennisnet\ECK;

use Kennisnet\ECK\Model\Entry;

/**
 * @deprecated since 1.1.0, use Kennisnet\ECK\Model\Entry instead
 */
final class EckRecord extends Entry
{
    /** @deprecated since 1.1.0 */
    const TITLE       = 'Title';
    /** @deprecated since 1.1.0 */
    const DESCRIPTION = 'Description';
    /** @deprecated since 1.1.0 */
    const INFORMATION_LOCATION = 'InformationLocation';
    /** @deprecated since 1.1.0 */
    const PUBLISHER   = 'Publisher';
    /** @deprecated since 1.1.0 */
    const AUTHORS     = 'Authors';

    public function __construct(string $recordId, string $title)
    {
        parent::__construct($recordId);
        $this->setTitle($title);
    }

    /**
     * @deprecated Since 1.1.0
     */
    public function getLocation(): string
    {
        return $this->getInformationLocation() ?? '';
    }

    /**
     * @deprecated Since 1.1.0
     */
    public function setLocation(string $location): void
    {
        $this->setInformationLocation($location);
    }
}
