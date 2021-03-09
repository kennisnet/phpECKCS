<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\builder;

use Kennisnet\ECK\EckRecord;

final class EckRecordBuilder
{
    /**
     * @var EckRecord $record
     */
    private $record;

    public function __construct(EckRecord $record = null)
    {
        $this->record = $record ?? new EckRecord('1234', 'Test Record');
    }

    public static function withRecordIdAndTitle(string $recordId, string $title): self
    {
        return new self(new EckRecord($recordId, $title));
    }

    public function build(): EckRecord
    {
        return $this->record;
    }

    public function withDescription(string $description): self
    {
        $builder = clone $this;
        $builder->record->setDescription($description);
        return $builder;
    }

    public function withInformationLocation(string $informationLocation): self
    {
        $builder = clone $this;
        $builder->record->setInformationLocation($informationLocation);
        return $builder;
    }

    public function withPublisher(string $publisher): self
    {
        $builder = clone $this;
        $builder->record->setPublisher($publisher);
        return $builder;
    }

    /**
     * @var string[] $authors
     */
    public function withAuthors(array $authors): self
    {
        $builder = clone $this;
        $builder->record->setAuthors($authors);
        return $builder;
    }

}
