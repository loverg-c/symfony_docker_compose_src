<?php

namespace App\Utils\Mapper;

abstract class AMapper
{

    /**
     * @var array
     */
    protected $mappingTable = [];

    public function map(array $input): array
    {
        $output = array_map(function ($value) use ($input) {
            return $input[$value] ?? null;
        }, $this->mappingTable) ?: [];
        return array_filter($output, function ($input) {
           return isset($input) && $input !== '';
        });
    }
}
