<?php

namespace App\Utils\Mapper;

class AppUserMapper extends AMapper
{

    public function __construct()
    {
        $this->mappingTable = [
            'firstName' => 'given_name',
            'lastName' => 'family_name',
            'username' => 'sub',
            'email' => 'email',
            'openId' => 'sub',
            'identity' => 'sub',
            'password' => 'password',
            'gender' => 'gender',
            'birthDate' => 'birthdate',
            'birthPlace' => 'birthplace',
            'birthCountry' => 'birthcountry'
        ];
    }

    /**
     * @param array $input
     * @return array
     * @throws \Exception
     */
    public function map(array $input): array
    {
        $input['password'] = bin2hex(random_bytes(20));
        $input['gender'] = strtoupper($input['gender'] ?? '');
        return parent::map($input);
    }
}
