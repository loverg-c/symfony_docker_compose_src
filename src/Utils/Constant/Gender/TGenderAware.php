<?php

namespace App\Utils\Constant\Gender;

trait TGenderAware
{
    public static function isInGenderArray($needle): bool {
        $haystack = str_replace ( array('(', ')'), '', self::POSSIBLE_GENDER_REGEX);
        return \in_array($needle, explode('|', $haystack), true);
    }
}
