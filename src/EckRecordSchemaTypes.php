<?php
declare(strict_types=1);

namespace Kennisnet\ECK;

interface EckRecordSchemaTypes
{
    /** @deprecated Since 1.1.0 */
    const ECKCS_2_1_1 = 'eckcs2.1.1';
    /** @deprecated Since 1.1.0 */
    const ECKCS_2_2   = 'eckcs2.2';
    /** @deprecated Since 2.5.0 */
    const ECKCS_2_3   = 'eckcs2.3';
    /** @deprecated Since 2.5.0 */
    const ECKCS_2_4   = 'eckcs2.4';
    /** @deprecated Since 2.5.0 */
    const ECKCS_2_5   = 'eckcs2.5';

    const ECKCS_2_5_1   = 'eckcs2.5.1';

    const ECKCS_2_5_2   = 'eckcs2.5.2';

    const unsupportedVersion = [self::ECKCS_2_1_1, self::ECKCS_2_2, self::ECKCS_2_3, self::ECKCS_2_4, self::ECKCS_2_5];
}
