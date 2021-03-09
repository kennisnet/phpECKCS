<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

use Kennisnet\ECK\EckRecord;
use Kennisnet\ECK\Exception\MapperException;

final class ArrayToEckRecordMapper
{
    private const RecordId = 'RecordId';
    private const Title = 'Title';
    private const Authors = 'Authors';

    private const arrayProperties = [
        self::Authors
    ];


    /**
     * @throws MapperException
     */
    public static function mapArrayToEckRecord(array $recordArray): EckRecord
    {
        $eckRecord = new EckRecord($recordArray[self::RecordId], $recordArray[self::Title]);
        foreach (ArrayToEckRecordMapper::getSettablePropertiesForClass(EckRecord::class) as $methodVar) {
            $eckRecord = ArrayToEckRecordMapper::addPropertyToRecord($methodVar, $eckRecord, $recordArray);
        }
        return $eckRecord;
    }

    /**
     * @throws MapperException
     */
    private static function addPropertyToRecord(string $methodVar, EckRecord $eckRecord, array $recordArray): EckRecord
    {
        $parameterKey = ucfirst($methodVar);
        if (!isset($recordArray[$parameterKey])) {
            return $eckRecord;
        }

        $setMethodName = sprintf('set%s', $parameterKey);
        if (!method_exists(EckRecord::class, $setMethodName)) {
            throw MapperException::becauseMethodIsNotImplementedInTargetClass($setMethodName, EckRecord::class);
        }

        $eckRecord->$setMethodName(ArrayToEckRecordMapper::mapParameterValueToProperty($parameterKey, $recordArray));
        return $eckRecord;
    }

    /**
     * @return mixed
     */
    private static function mapParameterValueToProperty(string $parameterKey, array $recordArray)
    {
        if (in_array($parameterKey, self::arrayProperties)) {
            return ArrayToEckRecordMapper::mapArrayParameterValueToProperty($recordArray[$parameterKey]);
        }

        return $recordArray[$parameterKey];
    }

    /**
     * @return mixed
     */
    private static function mapArrayParameterValueToProperty(array $parameterValues)
    {
        return array_values($parameterValues);
    }

    /**
     * @return string[]
     */
    private static function getSettablePropertiesForClass(string $class): array
    {
        $setterMethods = array_filter(get_class_methods($class), function (string $methodName) {
            return substr($methodName, 0,3) === 'set';
        });
        return array_values(
            array_map(function (string $setMethod) {
                return substr($setMethod, 3);
            }, $setterMethods)
        );
    }
}
