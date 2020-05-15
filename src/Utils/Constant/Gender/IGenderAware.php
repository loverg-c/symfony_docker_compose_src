<?php

namespace App\Utils\Constant\Gender;

interface IGenderAware
{
    public const GENDER_MALE = 'MALE';
    public const GENDER_FEMALE = 'FEMALE';

    public const POSSIBLE_GENDER_REGEX = '(' .
    self::GENDER_MALE . '|' .
    self::GENDER_FEMALE .
    ')';

    public const POSSIBLE_GENDER_MATCH_REGEX = '/^' . self::POSSIBLE_GENDER_REGEX . '$/';

    /**
     * @param $needle
     * @return bool
     */
    public static function isInGenderArray($needle): bool;
}
