<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

use Kennisnet\ECK\EckRecord;

final class ArrayToEckRecordMapper
{
    public static function mapArrayToEckRecord(array $recordArray): EckRecord
    {
        $eckRecord = new EckRecord($recordArray['RecordId'], $recordArray['Title']);
        $eckRecord->setLastModifiedDate(StringToDateMapper::mapStringToDate($recordArray['LastModifiedDate'] ?? null));
        $eckRecord->setDescription($recordArray['Description'] ?? '');
        $eckRecord->setEnvironments(ArrayToEnvironmentsMapper::mapArrayToEnvironments($recordArray['Environments'] ?? null));
        $eckRecord->setPublisher($recordArray['Publisher'] ?? null);
        $eckRecord->setAuthors(ArrayToStringArrayMapper::mapArrayToStringArray($recordArray['Authors'] ?? []));
        $eckRecord->setInformationLocation($recordArray['InformationLocation'] ?? null);
        $eckRecord->setProductId($recordArray['ProductId'] ?? null);
        $eckRecord->setPublisherThumbnailLocation($recordArray['PublisherThumbnailLocation'] ?? null);
        $eckRecord->setProductThumbnailLocation($recordArray['ProductThumbnailLocation'] ?? null);
        $eckRecord->setProductFamilyName($recordArray['ProductFamilyName'] ?? null);
        $eckRecord->setContentLocation($recordArray['ContentLocation'] ?? null);
        $eckRecord->setAccessLocation($recordArray['AccessLocation'] ?? null);
        $eckRecord->setSubProducts(ArrayToStringArrayMapper::mapArrayToStringArray($recordArray['SubProducts'] ?? []));
        $eckRecord->setFirstPublishedDate(StringToDateMapper::mapStringToDate($recordArray['FirstPublishedDate'] ?? null));
        $eckRecord->setDeprecationDate(StringToDateMapper::mapStringToDate($recordArray['DeprecationDate'] ?? null));
        $eckRecord->setSupportedUntilDate(StringToDateMapper::mapStringToDate($recordArray['SupportedUntilDate'] ?? null));
        $eckRecord->setEndOfLifeDate(StringToDateMapper::mapStringToDate($recordArray['EndOfLifeDate'] ?? null));
        $eckRecord->setLastRevisionDate(StringToDateMapper::mapStringToDate($recordArray['LastRevisionDate'] ?? null));
        $eckRecord->setFollowupProduct($recordArray['FollowupProduct'] ?? null);
        $eckRecord->setEdition($recordArray['Edition'] ?? null);
        $eckRecord->setVersion($recordArray['Version'] ?? null);
        $eckRecord->setProductState($recordArray['ProductState'] ?? null);
        $eckRecord->setIntendedEndUserRole($recordArray['IntendedEndUserRole'] ?? null);
        $eckRecord->setMedium($recordArray['Medium'] ?? null);
        $eckRecord->setIsConsumptionProduct(StringToBoolMapper::mapStringToBool($recordArray['IsConsumptionProduct'] ?? null));
        $eckRecord->setProductUsages(ArrayToStringArrayMapper::mapArrayToStringArray($recordArray['ProductUsages'] ?? []));
        $eckRecord->setSectors(ArrayToStringArrayMapper::mapArrayToStringArray($recordArray['Sectors'] ?? []));
        $eckRecord->setCourses(ArrayToStringArrayMapper::mapArrayToStringArray($recordArray['Courses'] ?? []));
        $eckRecord->setLevels(ArrayToStringArrayMapper::mapArrayToStringArray($recordArray['Levels'] ?? []));
        $eckRecord->setYears(ArrayToStringArrayMapper::mapArrayToStringArray($recordArray['Years'] ?? []));
        $eckRecord->setSubjects(ArrayToStringArrayMapper::mapArrayToStringArray($recordArray['Subjects'] ?? []));
        $eckRecord->setCurriculumInformationLocation($recordArray['CurriculumInformationLocation'] ?? null);
        $eckRecord->setSaleUnitSize(StringToIntMapper::mapStringToInt($recordArray['SaleUnitSize'] ?? null));
        $eckRecord->setSupplier($recordArray['Supplier'] ?? null);
        $eckRecord->setSupplierThumbnailLocation($recordArray['SupplierThumbnailLocation'] ?? null);
        $eckRecord->setPrices(ArrayToPricesMapper::mapArrayToPrices($recordArray['Prices'] ?? []));
        $eckRecord->setPriceIsIndicative(StringToBoolMapper::mapStringToBool($recordArray['PriceIsIndicative'] ?? null));
        $eckRecord->setIsLicensed(StringToBoolMapper::mapStringToBool($recordArray['IsLicensed'] ?? null));
        $eckRecord->setActivationBefore(ArrayToActivationBeforeMapper::mapArrayToActivationBefore($recordArray['ActivationBefore'] ?? null));
        $eckRecord->setLicenseAvailabilityOptions($recordArray['LicenseAvailabilityOptions'] ?? null);
        $eckRecord->setLicenseStartDate(StringToDateMapper::mapStringToDate($recordArray['LicenseStartDate'] ?? null));
        $eckRecord->setLicenseEndDate(StringToDateMapper::mapStringToDate($recordArray['LicenseEndDate'] ?? null));
        $eckRecord->setLicenseDuration($recordArray['LicenseDuration'] ?? null);
        $eckRecord->setLicenseCount(StringToIntMapper::mapStringToInt($recordArray['LicenseCount'] ?? null));
        $eckRecord->setAdditionalLicenseOptions(ArrayToAdditionalLicenseOptionsMapper::mapArrayToAdditionalLicenseOptions($recordArray['AdditionalLicenseOptions']));
        $eckRecord->setIsCatalogItem(StringToBoolMapper::mapStringToBool($recordArray['IsCatalogItem'] ?? null));
        $eckRecord->setCopyright($recordArray['Copyright'] ?? null);
        return $eckRecord;
    }
}
