<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Model;

use DateTimeImmutable;

class Entry
{
    /** @var string */
    private $recordId = '';

    /** @var DateTimeImmutable|null */
    private $lastModifiedDate = null;

    /** ProductDataGrp **/

    /** @var string */
    private $productId = '';

    /** @var string */
    private $publisher = '';

    /** @var string */
    private $publisherThumbnailLocation = '';

    /** @var string|null */
    private $productThumbnailLocation = null;

    /** @var string|null */
    private $productFamilyName = null;

    /** @var string */
    private $title = '';

    /** @var string[] */
    private $authors = [];

    /** @var string */
    private $description = '';

    /** @var Environments|null */
    private $environments = null;

    /** @var string|null */
    private $contentLocation = null;

    /** @var string|null */
    private $accessLocation = null;

    /** @var string[] */
    private $subProducts = [];

    /** LifecyleGrp **/

    /** @var DateTimeImmutable|null */
    private $firstPublishedDate = null;

    /** @var DateTimeImmutable|null */
    private $deprecationDate = null;

    /** @var DateTimeImmutable|null */
    private $supportedUntilDate = null;

    /** @var DateTimeImmutable|null */
    private $endOfLifeDate = null;

    /** @var DateTimeImmutable|null */
    private $lastRevisionDate = null;

    /** @var string|null */
    private $followupProduct = null;

    /** @var string|null */
    private $edition = null;

    /** @var string|null */
    private $version = null;

    /** @var string|null */
    private $productState = null;

    /** EducationalGrp **/

    /** @var string|null */
    private $informationLocation = null;

    /** @var string */
    private $intendedEndUserRole = '';

    /** @var string */
    private $medium = '';

    /** @var bool */
    private $isConsumptionProduct = false;

    /** @var string[] */
    private $productUsages = [];

    /** EducationalClassificationGrp **/

    /** @var string[] */
    private $sectors = [];

    /** @var string[] */
    private $courses = [];

    /** @var string[] */
    private $levels = [];

    /** @var string[] */
    private $years = [];

    /** @var string[] */
    private $subjects = [];

    /** @var string|null */
    private $curriculumInformationLocation = null;

    /** PurchaseGrp **/

    /** @var int */
    private $saleUnitSize = 0;

    /** @var string|null */
    private $supplier = null;

    /** @var string|null */
    private $supplierThumbnailLocation = null;

    /** @var Prices|null */
    private $prices = null;

    /** @var bool */
    private $priceIsIndicative = false;

    /** LicenseDataGrp **/

    /** @var bool */
    private $isLicensed = false;

    /**
     * @Todo: Add ActivationBefore complex object
     * ActivationBefore<complex>
     **/

    /** @var string|null */
    private $licenseAvailabilityOptions = null;

    /** @var DateTimeImmutable|null */
    private $licenseStartDate = null;

    /** @var DateTimeImmutable|null */
    private $licenseEndDate = null;

    /** @var string|null */
    private $licenseDuration = null;

    /** @var int */
    private $licenseCount = 0;

    /**
     * @Todo: Add AdditionalLicenseOptions complex object
     * AdditionalLicenseOptions<complex>
     **/

    /** @var bool */
    private $isCatalogItem = false;

    /** @var string|null */
    private $copyright = null;

    public function __construct(string $recordId)
    {
        $this->recordId = $recordId;
    }

    public function getRecordId(): string
    {
        return $this->recordId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getLastModifiedDate(): ?DateTimeImmutable
    {
        return $this->lastModifiedDate;
    }

    public function setLastModifiedDate(?DateTimeImmutable $lastModifiedDate): void
    {
        $this->lastModifiedDate = $lastModifiedDate;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getEnvironments(): ?Environments
    {
        return $this->environments;
    }

    public function setEnvironments(?Environments $environments): void
    {
        $this->environments = $environments;
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

    public function getInformationLocation(): ?string
    {
        return $this->informationLocation;
    }

    public function setInformationLocation(?string $informationLocation): void
    {
        $this->informationLocation = $informationLocation;
    }

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function setProductId(string $productId): void
    {
        $this->productId = $productId;
    }

    public function getPublisherThumbnailLocation(): string
    {
        return $this->publisherThumbnailLocation;
    }

    public function setPublisherThumbnailLocation(string $publisherThumbnailLocation): void
    {
        $this->publisherThumbnailLocation = $publisherThumbnailLocation;
    }

    public function getProductThumbnailLocation(): ?string
    {
        return $this->productThumbnailLocation;
    }

    public function setProductThumbnailLocation(?string $productThumbnailLocation): void
    {
        $this->productThumbnailLocation = $productThumbnailLocation;
    }

    public function getProductFamilyName(): ?string
    {
        return $this->productFamilyName;
    }

    public function setProductFamilyName(?string $productFamilyName): void
    {
        $this->productFamilyName = $productFamilyName;
    }

    public function getContentLocation(): ?string
    {
        return $this->contentLocation;
    }

    public function setContentLocation(?string $contentLocation): void
    {
        $this->contentLocation = $contentLocation;
    }

    public function getAccessLocation(): ?string
    {
        return $this->accessLocation;
    }

    public function setAccessLocation(?string $accessLocation): void
    {
        $this->accessLocation = $accessLocation;
    }

    public function getSubProducts(): array
    {
        return $this->subProducts;
    }

    public function setSubProducts(array $subProducts): void
    {
        $this->subProducts = $subProducts;
    }

    public function getFirstPublishedDate(): ?DateTimeImmutable
    {
        return $this->firstPublishedDate;
    }

    public function setFirstPublishedDate(?DateTimeImmutable $firstPublishedDate): void
    {
        $this->firstPublishedDate = $firstPublishedDate;
    }

    public function getDeprecationDate(): ?DateTimeImmutable
    {
        return $this->deprecationDate;
    }

    public function setDeprecationDate(?DateTimeImmutable $deprecationDate): void
    {
        $this->deprecationDate = $deprecationDate;
    }

    public function getSupportedUntilDate(): ?DateTimeImmutable
    {
        return $this->supportedUntilDate;
    }

    public function setSupportedUntilDate(?DateTimeImmutable $supportedUntilDate): void
    {
        $this->supportedUntilDate = $supportedUntilDate;
    }

    public function getEndOfLifeDate(): ?DateTimeImmutable
    {
        return $this->endOfLifeDate;
    }

    public function setEndOfLifeDate(?DateTimeImmutable $endOfLifeDate): void
    {
        $this->endOfLifeDate = $endOfLifeDate;
    }

    public function getLastRevisionDate(): ?DateTimeImmutable
    {
        return $this->lastRevisionDate;
    }

    public function setLastRevisionDate(?DateTimeImmutable $lastRevisionDate): void
    {
        $this->lastRevisionDate = $lastRevisionDate;
    }

    public function getFollowupProduct(): ?string
    {
        return $this->followupProduct;
    }

    public function setFollowupProduct(?string $followupProduct): void
    {
        $this->followupProduct = $followupProduct;
    }

    public function getEdition(): ?string
    {
        return $this->edition;
    }

    public function setEdition(?string $edition): void
    {
        $this->edition = $edition;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): void
    {
        $this->version = $version;
    }

    public function getProductState(): ?string
    {
        return $this->productState;
    }

    public function setProductState(?string $productState): void
    {
        $this->productState = $productState;
    }

    public function getIntendedEndUserRole(): string
    {
        return $this->intendedEndUserRole;
    }

    public function setIntendedEndUserRole(string $intendedEndUserRole): void
    {
        $this->intendedEndUserRole = $intendedEndUserRole;
    }

    public function getMedium(): string
    {
        return $this->medium;
    }

    public function setMedium(string $medium): void
    {
        $this->medium = $medium;
    }

    public function isConsumptionProduct(): bool
    {
        return $this->isConsumptionProduct;
    }

    public function setIsConsumptionProduct(bool $isConsumptionProduct): void
    {
        $this->isConsumptionProduct = $isConsumptionProduct;
    }

    public function getProductUsages(): array
    {
        return $this->productUsages;
    }

    public function setProductUsages(array $productUsages): void
    {
        $this->productUsages = $productUsages;
    }

    public function getSectors(): array
    {
        return $this->sectors;
    }

    public function setSectors(array $sectors): void
    {
        $this->sectors = $sectors;
    }

    public function getCourses(): array
    {
        return $this->courses;
    }

    public function setCourses(array $courses): void
    {
        $this->courses = $courses;
    }

    public function getLevels(): array
    {
        return $this->levels;
    }

    public function setLevels(array $levels): void
    {
        $this->levels = $levels;
    }

    public function getYears(): array
    {
        return $this->years;
    }

    public function setYears(array $years): void
    {
        $this->years = $years;
    }

    public function getSubjects(): array
    {
        return $this->subjects;
    }

    public function setSubjects(array $subjects): void
    {
        $this->subjects = $subjects;
    }

    public function getCurriculumInformationLocation(): ?string
    {
        return $this->curriculumInformationLocation;
    }

    public function setCurriculumInformationLocation(?string $curriculumInformationLocation): void
    {
        $this->curriculumInformationLocation = $curriculumInformationLocation;
    }

    public function getSaleUnitSize(): int
    {
        return $this->saleUnitSize;
    }

    public function setSaleUnitSize(int $saleUnitSize): void
    {
        $this->saleUnitSize = $saleUnitSize;
    }

    public function getSupplier(): ?string
    {
        return $this->supplier;
    }

    public function setSupplier(?string $supplier): void
    {
        $this->supplier = $supplier;
    }

    public function getSupplierThumbnailLocation(): ?string
    {
        return $this->supplierThumbnailLocation;
    }

    public function setSupplierThumbnailLocation(?string $supplierThumbnailLocation): void
    {
        $this->supplierThumbnailLocation = $supplierThumbnailLocation;
    }

    public function getPrices(): ?Prices
    {
        return $this->prices;
    }

    public function setPrices(?Prices $prices): void
    {
        $this->prices = $prices;
    }

    public function isPriceIsIndicative(): bool
    {
        return $this->priceIsIndicative;
    }

    public function setPriceIsIndicative(bool $priceIsIndicative): void
    {
        $this->priceIsIndicative = $priceIsIndicative;
    }

    public function isLicensed(): bool
    {
        return $this->isLicensed;
    }

    public function setIsLicensed(bool $isLicensed): void
    {
        $this->isLicensed = $isLicensed;
    }

    public function getLicenseAvailabilityOptions(): ?string
    {
        return $this->licenseAvailabilityOptions;
    }

    public function setLicenseAvailabilityOptions(?string $licenseAvailabilityOptions): void
    {
        $this->licenseAvailabilityOptions = $licenseAvailabilityOptions;
    }

    public function getLicenseStartDate(): ?DateTimeImmutable
    {
        return $this->licenseStartDate;
    }

    public function setLicenseStartDate(?DateTimeImmutable $licenseStartDate): void
    {
        $this->licenseStartDate = $licenseStartDate;
    }

    public function getLicenseEndDate(): ?DateTimeImmutable
    {
        return $this->licenseEndDate;
    }

    public function setLicenseEndDate(?DateTimeImmutable $licenseEndDate): void
    {
        $this->licenseEndDate = $licenseEndDate;
    }

    public function getLicenseDuration(): ?string
    {
        return $this->licenseDuration;
    }

    public function setLicenseDuration(?string $licenseDuration): void
    {
        $this->licenseDuration = $licenseDuration;
    }

    public function getLicenseCount(): int
    {
        return $this->licenseCount;
    }

    public function setLicenseCount(int $licenseCount): void
    {
        $this->licenseCount = $licenseCount;
    }

    public function isCatalogItem(): bool
    {
        return $this->isCatalogItem;
    }

    public function setIsCatalogItem(bool $isCatalogItem): void
    {
        $this->isCatalogItem = $isCatalogItem;
    }

    public function getCopyright(): ?string
    {
        return $this->copyright;
    }

    public function setCopyright(?string $copyright): void
    {
        $this->copyright = $copyright;
    }
}
