<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\builder;

use DateTimeImmutable;
use Kennisnet\ECK\Model\EckRecord;
use Kennisnet\ECK\Model\Prices;

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

    public function withLastModifiedDate(DateTimeImmutable $lastModifiedDate): self
    {
        $builder = clone $this;
        $builder->record->setLastModifiedDate($lastModifiedDate);
        return $builder;
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

    public function withProductId(string $productId): self
    {
        $builder = clone $this;
        $builder->record->setProductId($productId);
        return $builder;
    }

    public function withPublisherThumbnailLocation(string $publisherThumbnailLocation): self
    {
        $builder = clone $this;
        $builder->record->setPublisherThumbnailLocation($publisherThumbnailLocation);
        return $builder;
    }

    public function withProductThumbnailLocation(?string $productThumbnailLocation): self
    {
        $builder = clone $this;
        $builder->record->setProductThumbnailLocation($productThumbnailLocation);
        return $builder;
    }

    public function withProductFamilyName(?string $productFamilyName): self
    {
        $builder = clone $this;
        $builder->record->setProductFamilyName($productFamilyName);
        return $builder;
    }

    public function withContentLocation(?string $contentLocation): self
    {
        $builder = clone $this;
        $builder->record->setContentLocation($contentLocation);
        return $builder;
    }

    public function withAccessLocation(?string $accessLocation): self
    {
        $builder = clone $this;
        $builder->record->setAccessLocation($accessLocation);
        return $builder;
    }

    public function withSubProducts(array $subProducts): self
    {
        $builder = clone $this;
        $builder->record->setSubProducts($subProducts);
        return $builder;
    }

    public function withFirstPublishedDate(?DateTimeImmutable $firstPublishedDate): self
    {
        $builder = clone $this;
        $builder->record->setFirstPublishedDate($firstPublishedDate);
        return $builder;
    }

    public function withDeprecationDate(?DateTimeImmutable $deprecationDate): self
    {
        $builder = clone $this;
        $builder->record->setDeprecationDate($deprecationDate);
        return $builder;
    }

    public function withSupportedUntilDate(?DateTimeImmutable $supportedUntilDate): self
    {
        $builder = clone $this;
        $builder->record->setSupportedUntilDate($supportedUntilDate);
        return $builder;
    }

    public function withEndOfLifeDate(?DateTimeImmutable $endOfLifeDate): self
    {
        $builder = clone $this;
        $builder->record->setEndOfLifeDate($endOfLifeDate);
        return $builder;
    }

    public function withLastRevisionDate(?DateTimeImmutable $lastRevisionDate): self
    {
        $builder = clone $this;
        $builder->record->setLastRevisionDate($lastRevisionDate);
        return $builder;
    }

    public function withFollowupProduct(?string $followupProduct): self
    {
        $builder = clone $this;
        $builder->record->setFollowupProduct($followupProduct);
        return $builder;
    }

    public function withEdition(?string $edition): self
    {
        $builder = clone $this;
        $builder->record->setEdition($edition);
        return $builder;
    }

    public function withVersion(?string $version): self
    {
        $builder = clone $this;
        $builder->record->setVersion($version);
        return $builder;
    }

    public function withProductState(?string $productState): self
    {
        $builder = clone $this;
        $builder->record->setProductState($productState);
        return $builder;
    }

    public function withIntendedEndUserRole(string $intendedEndUserRole): self
    {
        $builder = clone $this;
        $builder->record->setIntendedEndUserRole($intendedEndUserRole);
        return $builder;
    }

    public function withMedium(string $medium): self
    {
        $builder = clone $this;
        $builder->record->setMedium($medium);
        return $builder;
    }

    public function withIsConsumptionProduct(bool $isConsumptionProduct): self
    {
        $builder = clone $this;
        $builder->record->setIsConsumptionProduct($isConsumptionProduct);
        return $builder;
    }

    public function withProductUsages(array $productUsages): self
    {
        $builder = clone $this;
        $builder->record->setProductUsages($productUsages);
        return $builder;
    }

    public function withSectors(array $sectors): self
    {
        $builder = clone $this;
        $builder->record->setSectors($sectors);
        return $builder;
    }

    public function withCourses(array $courses): self
    {
        $builder = clone $this;
        $builder->record->setCourses($courses);
        return $builder;
    }

    public function withLevels(array $levels): self
    {
        $builder = clone $this;
        $builder->record->setLevels($levels);
        return $builder;
    }

    public function withYears(array $years): self
    {
        $builder = clone $this;
        $builder->record->setYears($years);
        return $builder;
    }

    public function withSubjects(array $subjects): self
    {
        $builder = clone $this;
        $builder->record->setSubjects($subjects);
        return $builder;
    }

    public function withCurriculumInformationLocation(?string $curriculumInformationLocation): self
    {
        $builder = clone $this;
        $builder->record->setCurriculumInformationLocation($curriculumInformationLocation);
        return $builder;
    }

    public function withSaleUnitSize(int $saleUnitSize): self
    {
        $builder = clone $this;
        $builder->record->setSaleUnitSize($saleUnitSize);
        return $builder;
    }

    public function withSupplier(?string $supplier): self
    {
        $builder = clone $this;
        $builder->record->setSupplier($supplier);
        return $builder;
    }

    public function withSupplierThumbnailLocation(?string $supplierThumbnailLocation): self
    {
        $builder = clone $this;
        $builder->record->setSupplierThumbnailLocation($supplierThumbnailLocation);
        return $builder;
    }

    public function withPriceIsIndicative(bool $priceIsIndicative): self
    {
        $builder = clone $this;
        $builder->record->setPriceIsIndicative($priceIsIndicative);
        return $builder;
    }

    public function withIsLicensed(bool $isLicensed): self
    {
        $builder = clone $this;
        $builder->record->setIsLicensed($isLicensed);
        return $builder;
    }

    public function withLicenseAvailabilityOptions(array $licenseAvailabilityOptions): self
    {
        $builder = clone $this;
        $builder->record->setLicenseAvailabilityOptions($licenseAvailabilityOptions);
        return $builder;
    }

    public function withLicenseStartDate(?DateTimeImmutable $licenseStartDate): self
    {
        $builder = clone $this;
        $builder->record->setLicenseStartDate($licenseStartDate);
        return $builder;
    }

    public function withLicenseEndDate(?DateTimeImmutable $licenseEndDate): self
    {
        $builder = clone $this;
        $builder->record->setLicenseEndDate($licenseEndDate);
        return $builder;
    }

    public function withLicenseDuration(?string $licenseDuration): self
    {
        $builder = clone $this;
        $builder->record->setLicenseDuration($licenseDuration);
        return $builder;
    }

    public function withLicenseCount(int $licenseCount): self
    {
        $builder = clone $this;
        $builder->record->setLicenseCount($licenseCount);
        return $builder;
    }

    public function withIsCatalogItem(bool $isCatalogItem): self
    {
        $builder = clone $this;
        $builder->record->setIsCatalogItem($isCatalogItem);
        return $builder;
    }

    public function withCopyright(?string $copyright): self
    {
        $builder = clone $this;
        $builder->record->setCopyright($copyright);
        return $builder;
    }

    public function withPrices(?Prices $prices): self
    {
        $builder = clone $this;
        $builder->record->setPrices($prices);
        return $builder;
    }


}
