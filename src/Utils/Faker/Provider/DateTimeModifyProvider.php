<?php

namespace App\Utils\Faker\Provider;

use Faker\Provider\DateTime as BaseProvider;

final class DateTimeModifyProvider extends BaseProvider
{
    /**
     * Modify the datetime object
     *
     * @param \DateTime|string $dateTime
     * @param string $modifier
     * @return \DateTime
     * @throws \Exception
     */
    public static function dateTimeModifier($dateTime = 'now', string $modifier = ''): \DateTime
    {
        $dateTime = $dateTime instanceof \DateTime ? clone $dateTime : new \DateTime($dateTime);
        return $dateTime->modify($modifier);
    }
}
