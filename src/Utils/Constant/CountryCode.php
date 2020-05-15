<?php

namespace App\Utils\Constant;

abstract class CountryCode
{
    public const NAME_KEY = 'name';
    public const ALPHA2_KEY = 'alpha2';
    public const ALPHA3_KEY = 'alpha3';
    public const NUMERIC_KEY = 'numeric';
    public const CURRENCY_KEY = 'currency';
    public const INSEE_KEY = 'insee';

    public static function findCountry($value): ?array
    {
        return array_values(array_filter(self::LIST_COUNTRIES, function ($k) use ($value) {
                return in_array(strtoupper($value), $k, true)
                    || (is_array($k[self::INSEE_KEY]) && in_array($value, $k[self::INSEE_KEY], true));
            }))[0] ?? null;
    }

    protected const LIST_COUNTRIES = [
        [
            self::NAME_KEY => 'AFGHANISTAN',
            self::ALPHA2_KEY => 'AF',
            self::ALPHA3_KEY => 'AFG',
            self::NUMERIC_KEY => '004',
            self::INSEE_KEY => '99212',
            self::CURRENCY_KEY => [
                'AFN',
            ],
        ],
        [
            self::NAME_KEY => 'ÅLAND ISLANDS',
            self::ALPHA2_KEY => 'AX',
            self::ALPHA3_KEY => 'ALA',
            self::NUMERIC_KEY => '248',
            self::INSEE_KEY => '',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'ALBANIA',
            self::ALPHA2_KEY => 'AL',
            self::ALPHA3_KEY => 'ALB',
            self::NUMERIC_KEY => '008',
            self::INSEE_KEY => '99125',
            self::CURRENCY_KEY => [
                'ALL',
            ],
        ],
        [
            self::NAME_KEY => 'ALGERIA',
            self::ALPHA2_KEY => 'DZ',
            self::ALPHA3_KEY => 'DZA',
            self::NUMERIC_KEY => '012',
            self::INSEE_KEY => '99352',
            self::CURRENCY_KEY => [
                'DZD',
            ],
        ],
        [
            self::NAME_KEY => 'AMERICAN SAMOA',
            self::ALPHA2_KEY => 'AS',
            self::ALPHA3_KEY => 'ASM',
            self::NUMERIC_KEY => '016',
            self::INSEE_KEY => '99505',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'ANDORRA',
            self::ALPHA2_KEY => 'AD',
            self::ALPHA3_KEY => 'AND',
            self::NUMERIC_KEY => '020',
            self::INSEE_KEY => '99130',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'ANGOLA',
            self::ALPHA2_KEY => 'AO',
            self::ALPHA3_KEY => 'AGO',
            self::NUMERIC_KEY => '024',
            self::INSEE_KEY => '99395',
            self::CURRENCY_KEY => [
                'AOA',
            ],
        ],
        [
            self::NAME_KEY => 'ANGUILLA',
            self::ALPHA2_KEY => 'AI',
            self::ALPHA3_KEY => 'AIA',
            self::NUMERIC_KEY => '660',
            self::INSEE_KEY => '99425',
            self::CURRENCY_KEY => [
                'XCD',
            ],
        ],
        [
            self::NAME_KEY => 'ANTARCTICA',
            self::ALPHA2_KEY => 'AQ',
            self::ALPHA3_KEY => 'ATA',
            self::NUMERIC_KEY => '010',
            self::INSEE_KEY => '',
            self::CURRENCY_KEY => [
                'ARS',
                'AUD',
                'BGN',
                'BRL',
                'BYR',
                'CLP',
                'CNY',
                'CZK',
                'EUR',
                'GBP',
                'INR',
                'JPY',
                'KRW',
                'NOK',
                'NZD',
                'PEN',
                'PKR',
                'PLN',
                'RON',
                'RUB',
                'SEK',
                'UAH',
                'USD',
                'UYU',
                'ZAR',
            ],
        ],
        [
            self::NAME_KEY => 'ANTIGUA AND BARBUDA',
            self::ALPHA2_KEY => 'AG',
            self::ALPHA3_KEY => 'ATG',
            self::NUMERIC_KEY => '028',
            self::INSEE_KEY => '99441',
            self::CURRENCY_KEY => [
                'XCD',
            ],
        ],
        [
            self::NAME_KEY => 'ARGENTINA',
            self::ALPHA2_KEY => 'AR',
            self::ALPHA3_KEY => 'ARG',
            self::NUMERIC_KEY => '032',
            self::INSEE_KEY => '99415',
            self::CURRENCY_KEY => [
                'ARS',
            ],
        ],
        [
            self::NAME_KEY => 'ARMENIA',
            self::ALPHA2_KEY => 'AM',
            self::ALPHA3_KEY => 'ARM',
            self::NUMERIC_KEY => '051',
            self::INSEE_KEY => '99252',
            self::CURRENCY_KEY => [
                'AMD',
            ],
        ],
        [
            self::NAME_KEY => 'ARUBA',
            self::ALPHA2_KEY => 'AW',
            self::ALPHA3_KEY => 'ABW',
            self::NUMERIC_KEY => '533',
            self::INSEE_KEY => '99135',
            self::CURRENCY_KEY => [
                'AWG',
            ],
        ],
        [
            self::NAME_KEY => 'AUSTRALIA',
            self::ALPHA2_KEY => 'AU',
            self::ALPHA3_KEY => 'AUS',
            self::NUMERIC_KEY => '036',
            self::INSEE_KEY => '99501',
            self::CURRENCY_KEY => [
                'AUD',
            ],
        ],
        [
            self::NAME_KEY => 'AUSTRIA',
            self::ALPHA2_KEY => 'AT',
            self::ALPHA3_KEY => 'AUT',
            self::NUMERIC_KEY => '040',
            self::INSEE_KEY => '99110',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'AZERBAIJAN',
            self::ALPHA2_KEY => 'AZ',
            self::ALPHA3_KEY => 'AZE',
            self::NUMERIC_KEY => '031',
            self::INSEE_KEY => '99253',
            self::CURRENCY_KEY => [
                'AZN',
            ],
        ],
        [
            self::NAME_KEY => 'BAHAMAS',
            self::ALPHA2_KEY => 'BS',
            self::ALPHA3_KEY => 'BHS',
            self::NUMERIC_KEY => '044',
            self::INSEE_KEY => '99436',
            self::CURRENCY_KEY => [
                'BSD',
            ],
        ],
        [
            self::NAME_KEY => 'BAHRAIN',
            self::ALPHA2_KEY => 'BH',
            self::ALPHA3_KEY => 'BHR',
            self::NUMERIC_KEY => '048',
            self::INSEE_KEY => '99249',
            self::CURRENCY_KEY => [
                'BHD',
            ],
        ],
        [
            self::NAME_KEY => 'BANGLADESH',
            self::ALPHA2_KEY => 'BD',
            self::ALPHA3_KEY => 'BGD',
            self::NUMERIC_KEY => '050',
            self::INSEE_KEY => '99246',
            self::CURRENCY_KEY => [
                'BDT',
            ],
        ],
        [
            self::NAME_KEY => 'BARBADOS',
            self::ALPHA2_KEY => 'BB',
            self::ALPHA3_KEY => 'BRB',
            self::NUMERIC_KEY => '052',
            self::INSEE_KEY =>99434 ,
            self::CURRENCY_KEY => [
                'BBD',
            ],
        ],
        [
            self::NAME_KEY => 'BELARUS',
            self::ALPHA2_KEY => 'BY',
            self::ALPHA3_KEY => 'BLR',
            self::NUMERIC_KEY => '112',
            self::INSEE_KEY => '99148',
            self::CURRENCY_KEY => [
                'BYN',
            ],
        ],
        [
            self::NAME_KEY => 'BELGIUM',
            self::ALPHA2_KEY => 'BE',
            self::ALPHA3_KEY => 'BEL',
            self::NUMERIC_KEY => '056',
            self::INSEE_KEY => '99131',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'BELIZE',
            self::ALPHA2_KEY => 'BZ',
            self::ALPHA3_KEY => 'BLZ',
            self::NUMERIC_KEY => '084',
            self::INSEE_KEY => '99429',
            self::CURRENCY_KEY => [
                'BZD',
            ],
        ],
        [
            self::NAME_KEY => 'BENIN',
            self::ALPHA2_KEY => 'BJ',
            self::ALPHA3_KEY => 'BEN',
            self::NUMERIC_KEY => '204',
            self::INSEE_KEY => '99395',
            self::CURRENCY_KEY => [
                'XOF',
            ],
        ],
        [
            self::NAME_KEY => 'BERMUDA',
            self::ALPHA2_KEY => 'BM',
            self::ALPHA3_KEY => 'BMU',
            self::NUMERIC_KEY => '060',
            self::INSEE_KEY =>99425 ,
            self::CURRENCY_KEY => [
                'BMD',
            ],
        ],
        [
            self::NAME_KEY => 'BHUTAN',
            self::ALPHA2_KEY => 'BT',
            self::ALPHA3_KEY => 'BTN',
            self::NUMERIC_KEY => '064',
            self::INSEE_KEY => '99214',
            self::CURRENCY_KEY => [
                'BTN',
            ],
        ],
        [
            self::NAME_KEY => 'BOLIVIA (PLURINATIONAL STATE OF)',
            self::ALPHA2_KEY => 'BO',
            self::ALPHA3_KEY => 'BOL',
            self::NUMERIC_KEY => '068',
            self::INSEE_KEY =>99418 ,
            self::CURRENCY_KEY => [
                'BOB',
            ],
        ],
        [
            self::NAME_KEY => 'BONAIRE, SINT EUSTATIUS AND SABA',
            self::ALPHA2_KEY => 'BQ',
            self::ALPHA3_KEY => 'BES',
            self::NUMERIC_KEY => '535',
            self::INSEE_KEY => '99443',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'BOSNIA AND HERZEGOVINA',
            self::ALPHA2_KEY => 'BA',
            self::ALPHA3_KEY => 'BIH',
            self::NUMERIC_KEY => '070',
            self::INSEE_KEY => '99118',
            self::CURRENCY_KEY => [
                'BAM',
            ],
        ],
        [
            self::NAME_KEY => 'BOTSWANA',
            self::ALPHA2_KEY => 'BW',
            self::ALPHA3_KEY => 'BWA',
            self::NUMERIC_KEY => '072',
            self::INSEE_KEY => '99347',
            self::CURRENCY_KEY => [
                'BWP',
            ],
        ],
        [
            self::NAME_KEY => 'BOUVET ISLAND',
            self::ALPHA2_KEY => 'BV',
            self::ALPHA3_KEY => 'BVT',
            self::NUMERIC_KEY => '074',
            self::INSEE_KEY => '99103',
            self::CURRENCY_KEY => [
                'NOK',
            ],
        ],
        [
            self::NAME_KEY => 'BRAZIL',
            self::ALPHA2_KEY => 'BR',
            self::ALPHA3_KEY => 'BRA',
            self::NUMERIC_KEY => '076',
            self::INSEE_KEY => '99416',
            self::CURRENCY_KEY => [
                'BRL',
            ],
        ],
        [
            self::NAME_KEY => 'BRITISH INDIAN OCEAN TERRITORY',
            self::ALPHA2_KEY => 'IO',
            self::ALPHA3_KEY => 'IOT',
            self::NUMERIC_KEY => '086',
            self::INSEE_KEY => '99308',
            self::CURRENCY_KEY => [
                'GBP',
            ],
        ],
        [
            self::NAME_KEY => 'BRUNEI DARUSSALAM',
            self::ALPHA2_KEY => 'BN',
            self::ALPHA3_KEY => 'BRN',
            self::NUMERIC_KEY => '096',
            self::INSEE_KEY => '99225',
            self::CURRENCY_KEY => [
                'BND',
                'SGD',
            ],
        ],
        [
            self::NAME_KEY => 'BULGARIA',
            self::ALPHA2_KEY => 'BG',
            self::ALPHA3_KEY => 'BGR',
            self::NUMERIC_KEY => '100',
            self::INSEE_KEY => '99111',
            self::CURRENCY_KEY => [
                'BGN',
            ],
        ],
        [
            self::NAME_KEY => 'BURKINA FASO',
            self::ALPHA2_KEY => 'BF',
            self::ALPHA3_KEY => 'BFA',
            self::NUMERIC_KEY => '854',
            self::INSEE_KEY => '99331',
            self::CURRENCY_KEY => [
                'XOF',
            ],
        ],
        [
            self::NAME_KEY => 'BURUNDI',
            self::ALPHA2_KEY => 'BI',
            self::ALPHA3_KEY => 'BDI',
            self::NUMERIC_KEY => '108',
            self::INSEE_KEY => '99321',
            self::CURRENCY_KEY => [
                'BIF',
            ],
        ],
        [
            self::NAME_KEY => 'CABO VERDE',
            self::ALPHA2_KEY => 'CV',
            self::ALPHA3_KEY => 'CPV',
            self::NUMERIC_KEY => '132',
            self::INSEE_KEY => '99396',
            self::CURRENCY_KEY => [
                'CVE',
            ],
        ],
        [
            self::NAME_KEY => 'CAMBODIA',
            self::ALPHA2_KEY => 'KH',
            self::ALPHA3_KEY => 'KHM',
            self::NUMERIC_KEY => '116',
            self::INSEE_KEY => '99234',
            self::CURRENCY_KEY => [
                'KHR',
            ],
        ],
        [
            self::NAME_KEY => 'CAMEROON',
            self::ALPHA2_KEY => 'CM',
            self::ALPHA3_KEY => 'CMR',
            self::NUMERIC_KEY => '120',
            self::INSEE_KEY => ['99322', '99305'],
            self::CURRENCY_KEY => [
                'XAF',
            ],
        ],
        [
            self::NAME_KEY => 'CANADA',
            self::ALPHA2_KEY => 'CA',
            self::ALPHA3_KEY => 'CAN',
            self::NUMERIC_KEY => '124',
            self::INSEE_KEY => ['99401', '99403', '99402'],
            self::CURRENCY_KEY => [
                'CAD',
            ],
        ],
        [
            self::NAME_KEY => 'CAYMAN ISLANDS',
            self::ALPHA2_KEY => 'KY',
            self::ALPHA3_KEY => 'CYM',
            self::NUMERIC_KEY => '136',
            self::INSEE_KEY => '99425',
            self::CURRENCY_KEY => [
                'KYD',
            ],
        ],
        [
            self::NAME_KEY => 'CENTRAL AFRICAN REPUBLIC',
            self::ALPHA2_KEY => 'CF',
            self::ALPHA3_KEY => 'CAF',
            self::NUMERIC_KEY => '140',
            self::INSEE_KEY => '99323',
            self::CURRENCY_KEY => [
                'XAF',
            ],
        ],
        [
            self::NAME_KEY => 'CHAD',
            self::ALPHA2_KEY => 'TD',
            self::ALPHA3_KEY => 'TCD',
            self::NUMERIC_KEY => '148',
            self::INSEE_KEY => '99344',
            self::CURRENCY_KEY => [
                'XAF',
            ],
        ],
        [
            self::NAME_KEY => 'CHILE',
            self::ALPHA2_KEY => 'CL',
            self::ALPHA3_KEY => 'CHL',
            self::NUMERIC_KEY => '152',
            self::INSEE_KEY => '99417',
            self::CURRENCY_KEY => [
                'CLP',
            ],
        ],
        [
            self::NAME_KEY => 'CHINA',
            self::ALPHA2_KEY => 'CN',
            self::ALPHA3_KEY => 'CHN',
            self::NUMERIC_KEY => '156',
            self::INSEE_KEY =>['99216', '99218'] ,
            self::CURRENCY_KEY => [
                'CNY',
            ],
        ],
        [
            self::NAME_KEY => 'CHRISTMAS ISLAND',
            self::ALPHA2_KEY => 'CX',
            self::ALPHA3_KEY => 'CXR',
            self::NUMERIC_KEY => '162',
            self::INSEE_KEY => '99501',
            self::CURRENCY_KEY => [
                'AUD',
            ],
        ],
        [
            self::NAME_KEY => 'COCOS (KEELING) ISLANDS',
            self::ALPHA2_KEY => 'CC',
            self::ALPHA3_KEY => 'CCK',
            self::NUMERIC_KEY => '166',
            self::INSEE_KEY => '99501',
            self::CURRENCY_KEY => [
                'AUD',
            ],
        ],
        [
            self::NAME_KEY => 'COLOMBIA',
            self::ALPHA2_KEY => 'CO',
            self::ALPHA3_KEY => 'COL',
            self::NUMERIC_KEY => '170',
            self::INSEE_KEY => '99419',
            self::CURRENCY_KEY => [
                'COP',
            ],
        ],
        [
            self::NAME_KEY => 'COMOROS',
            self::ALPHA2_KEY => 'KM',
            self::ALPHA3_KEY => 'COM',
            self::NUMERIC_KEY => '174',
            self::INSEE_KEY => '99397',
            self::CURRENCY_KEY => [
                'KMF',
            ],
        ],
        [
            self::NAME_KEY => 'CONGO',
            self::ALPHA2_KEY => 'CG',
            self::ALPHA3_KEY => 'COG',
            self::NUMERIC_KEY => '178',
            self::INSEE_KEY => '99324',
            self::CURRENCY_KEY => [
                'XAF',
            ],
        ],
        [
            self::NAME_KEY => 'CONGO (DEMOCRATIC REPUBLIC OF THE)',
            self::ALPHA2_KEY => 'CD',
            self::ALPHA3_KEY => 'COD',
            self::NUMERIC_KEY => '180',
            self::INSEE_KEY => '99312',
            self::CURRENCY_KEY => [
                'CDF',
            ],
        ],
        [
            self::NAME_KEY => 'COOK ISLANDS',
            self::ALPHA2_KEY => 'CK',
            self::ALPHA3_KEY => 'COK',
            self::NUMERIC_KEY => '184',
            self::INSEE_KEY => '99502',
            self::CURRENCY_KEY => [
                'NZD',
            ],
        ],
        [
            self::NAME_KEY => 'COSTA RICA',
            self::ALPHA2_KEY => 'CR',
            self::ALPHA3_KEY => 'CRI',
            self::NUMERIC_KEY => '188',
            self::INSEE_KEY => '99406',
            self::CURRENCY_KEY => [
                'CRC',
            ],
        ],
        [
            self::NAME_KEY => 'CÔTE D\'IVOIRE',
            self::ALPHA2_KEY => 'CI',
            self::ALPHA3_KEY => 'CIV',
            self::NUMERIC_KEY => '384',
            self::INSEE_KEY => '99326',
            self::CURRENCY_KEY => [
                'XOF',
            ],
        ],
        [
            self::NAME_KEY => 'CROATIA',
            self::ALPHA2_KEY => 'HR',
            self::ALPHA3_KEY => 'HRV',
            self::NUMERIC_KEY => '191',
            self::INSEE_KEY => '99119',
            self::CURRENCY_KEY => [
                'HRK',
            ],
        ],
        [
            self::NAME_KEY => 'CUBA',
            self::ALPHA2_KEY => 'CU',
            self::ALPHA3_KEY => 'CUB',
            self::NUMERIC_KEY => '192',
            self::INSEE_KEY => '99407',
            self::CURRENCY_KEY => [
                'CUC',
                'CUP',
            ],
        ],
        [
            self::NAME_KEY => 'CURAÇAO',
            self::ALPHA2_KEY => 'CW',
            self::ALPHA3_KEY => 'CUW',
            self::NUMERIC_KEY => '531',
            self::INSEE_KEY => '99444',
            self::CURRENCY_KEY => [
                'ANG',
            ],
        ],
        [
            self::NAME_KEY => 'CYPRUS',
            self::ALPHA2_KEY => 'CY',
            self::ALPHA3_KEY => 'CYP',
            self::NUMERIC_KEY => '196',
            self::INSEE_KEY => '99254',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'CZECHIA',
            self::ALPHA2_KEY => 'CZ',
            self::ALPHA3_KEY => 'CZE',
            self::NUMERIC_KEY => '203',
            self::INSEE_KEY => ['99115', '99116'],
            self::CURRENCY_KEY => [
                'CZK',
            ],
        ],
        [
            self::NAME_KEY => 'DENMARK',
            self::ALPHA2_KEY => 'DK',
            self::ALPHA3_KEY => 'DNK',
            self::NUMERIC_KEY => '208',
            self::INSEE_KEY => '99101',
            self::CURRENCY_KEY => [
                'DKK',
            ],
        ],
        [
            self::NAME_KEY => 'DJIBOUTI',
            self::ALPHA2_KEY => 'DJ',
            self::ALPHA3_KEY => 'DJI',
            self::NUMERIC_KEY => '262',
            self::INSEE_KEY => '99399',
            self::CURRENCY_KEY => [
                'DJF',
            ],
        ],
        [
            self::NAME_KEY => 'DOMINICA',
            self::ALPHA2_KEY => 'DM',
            self::ALPHA3_KEY => 'DMA',
            self::NUMERIC_KEY => '212',
            self::INSEE_KEY => '99438',
            self::CURRENCY_KEY => [
                'XCD',
            ],
        ],
        [
            self::NAME_KEY => 'DOMINICAN REPUBLIC',
            self::ALPHA2_KEY => 'DO',
            self::ALPHA3_KEY => 'DOM',
            self::NUMERIC_KEY => '214',
            self::INSEE_KEY => '99408',
            self::CURRENCY_KEY => [
                'DOP',
            ],
        ],
        [
            self::NAME_KEY => 'ECUADOR',
            self::ALPHA2_KEY => 'EC',
            self::ALPHA3_KEY => 'ECU',
            self::NUMERIC_KEY => '218',
            self::INSEE_KEY => '99420',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'EGYPT',
            self::ALPHA2_KEY => 'EG',
            self::ALPHA3_KEY => 'EGY',
            self::NUMERIC_KEY => '818',
            self::INSEE_KEY => '99301',
            self::CURRENCY_KEY => [
                'EGP',
            ],
        ],
        [
            self::NAME_KEY => 'EL SALVADOR',
            self::ALPHA2_KEY => 'SV',
            self::ALPHA3_KEY => 'SLV',
            self::NUMERIC_KEY => '222',
            self::INSEE_KEY => '99414',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'EQUATORIAL GUINEA',
            self::ALPHA2_KEY => 'GQ',
            self::ALPHA3_KEY => 'GNQ',
            self::NUMERIC_KEY => '226',
            self::INSEE_KEY => '99314',
            self::CURRENCY_KEY => [
                'XAF',
            ],
        ],
        [
            self::NAME_KEY => 'ERITREA',
            self::ALPHA2_KEY => 'ER',
            self::ALPHA3_KEY => 'ERI',
            self::NUMERIC_KEY => '232',
            self::INSEE_KEY =>99317 ,
            self::CURRENCY_KEY => [
                'ERN',
            ],
        ],
        [
            self::NAME_KEY => 'ESTONIA',
            self::ALPHA2_KEY => 'EE',
            self::ALPHA3_KEY => 'EST',
            self::NUMERIC_KEY => '233',
            self::INSEE_KEY => '99106',
            self::CURRENCY_KEY => [
                'EEK',
            ],
        ],
        [
            self::NAME_KEY => 'ETHIOPIA',
            self::ALPHA2_KEY => 'ET',
            self::ALPHA3_KEY => 'ETH',
            self::NUMERIC_KEY => '231',
            self::INSEE_KEY => '99315',
            self::CURRENCY_KEY => [
                'ETB',
            ],
        ],
        [
            self::NAME_KEY => 'ESWATINI, THE KINGDOM OF',
            self::ALPHA2_KEY => 'SZ',
            self::ALPHA3_KEY => 'SWZ',
            self::NUMERIC_KEY => '748',
            self::INSEE_KEY => '99391',
            self::CURRENCY_KEY => [
                'SZL',
                'ZAR',
            ],
        ],
        [
            self::NAME_KEY => 'FALKLAND ISLANDS (MALVINAS)',
            self::ALPHA2_KEY => 'FK',
            self::ALPHA3_KEY => 'FLK',
            self::NUMERIC_KEY => '238',
            self::INSEE_KEY =>99427 ,
            self::CURRENCY_KEY => [
                'FKP',
            ],
        ],
        [
            self::NAME_KEY => 'FAROE ISLANDS',
            self::ALPHA2_KEY => 'FO',
            self::ALPHA3_KEY => 'FRO',
            self::NUMERIC_KEY => '234',
            self::INSEE_KEY => '99101',
            self::CURRENCY_KEY => [
                'DKK',
            ],
        ],
        [
            self::NAME_KEY => 'FIJI',
            self::ALPHA2_KEY => 'FJ',
            self::ALPHA3_KEY => 'FJI',
            self::NUMERIC_KEY => '242',
            self::INSEE_KEY => '99503',
            self::CURRENCY_KEY => [
                'FJD',
            ],
        ],
        [
            self::NAME_KEY => 'FINLAND',
            self::ALPHA2_KEY => 'FI',
            self::ALPHA3_KEY => 'FIN',
            self::NUMERIC_KEY => '246',
            self::INSEE_KEY => '99105',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'FRANCE',
            self::ALPHA2_KEY => 'FR',
            self::ALPHA3_KEY => 'FRA',
            self::NUMERIC_KEY => '250',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'FRENCH GUIANA',
            self::ALPHA2_KEY => 'GF',
            self::ALPHA3_KEY => 'GUF',
            self::NUMERIC_KEY => ['324', '254'],
            self::INSEE_KEY => '99330',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'FRENCH POLYNESIA',
            self::ALPHA2_KEY => 'PF',
            self::ALPHA3_KEY => 'PYF',
            self::NUMERIC_KEY => '258',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'XPF',
            ],
        ],
        [
            self::NAME_KEY => 'FRENCH SOUTHERN TERRITORIES',
            self::ALPHA2_KEY => 'TF',
            self::ALPHA3_KEY => 'ATF',
            self::NUMERIC_KEY => '260',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'GABON',
            self::ALPHA2_KEY => 'GA',
            self::ALPHA3_KEY => 'GAB',
            self::NUMERIC_KEY => '266',
            self::INSEE_KEY => '99328',
            self::CURRENCY_KEY => [
                'XAF',
            ],
        ],
        [
            self::NAME_KEY => 'GAMBIA',
            self::ALPHA2_KEY => 'GM',
            self::ALPHA3_KEY => 'GMB',
            self::NUMERIC_KEY => '270',
            self::INSEE_KEY => '99304',
            self::CURRENCY_KEY => [
                'GMD',
            ],
        ],
        [
            self::NAME_KEY => 'GEORGIA',
            self::ALPHA2_KEY => 'GE',
            self::ALPHA3_KEY => 'GEO',
            self::NUMERIC_KEY => '268',
            self::INSEE_KEY => '99255',
            self::CURRENCY_KEY => [
                'GEL',
            ],
        ],
        [
            self::NAME_KEY => 'GERMANY',
            self::ALPHA2_KEY => 'DE',
            self::ALPHA3_KEY => 'DEU',
            self::NUMERIC_KEY => '276',
            self::INSEE_KEY => ['99109', '99141', '99142'],
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'GHANA',
            self::ALPHA2_KEY => 'GH',
            self::ALPHA3_KEY => 'GHA',
            self::NUMERIC_KEY => '288',
            self::INSEE_KEY => '99329',
            self::CURRENCY_KEY => [
                'GHS',
            ],
        ],
        [
            self::NAME_KEY => 'GIBRALTAR',
            self::ALPHA2_KEY => 'GI',
            self::ALPHA3_KEY => 'GIB',
            self::NUMERIC_KEY => '292',
            self::INSEE_KEY => '99133',
            self::CURRENCY_KEY => [
                'GIP',
            ],
        ],
        [
            self::NAME_KEY => 'GREECE',
            self::ALPHA2_KEY => 'GR',
            self::ALPHA3_KEY => 'GRC',
            self::NUMERIC_KEY => '300',
            self::INSEE_KEY => '99126',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'GREENLAND',
            self::ALPHA2_KEY => 'GL',
            self::ALPHA3_KEY => 'GRL',
            self::NUMERIC_KEY => '304',
            self::INSEE_KEY =>99430,
            self::CURRENCY_KEY => [
                'DKK',
            ],
        ],
        [
            self::NAME_KEY => 'GRENADA',
            self::ALPHA2_KEY => 'GD',
            self::ALPHA3_KEY => 'GRD',
            self::NUMERIC_KEY => '308',
            self::INSEE_KEY => '99435',
            self::CURRENCY_KEY => [
                'XCD',
            ],
        ],
        [
            self::NAME_KEY => 'GUADELOUPE',
            self::ALPHA2_KEY => 'GP',
            self::ALPHA3_KEY => 'GLP',
            self::NUMERIC_KEY => '312',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'GUAM',
            self::ALPHA2_KEY => 'GU',
            self::ALPHA3_KEY => 'GUM',
            self::NUMERIC_KEY => '316',
            self::INSEE_KEY => '99505',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'GUATEMALA',
            self::ALPHA2_KEY => 'GT',
            self::ALPHA3_KEY => 'GTM',
            self::NUMERIC_KEY => '320',
            self::INSEE_KEY => '99409',
            self::CURRENCY_KEY => [
                'GTQ',
            ],
        ],
        [
            self::NAME_KEY => 'GUERNSEY',
            self::ALPHA2_KEY => 'GG',
            self::ALPHA3_KEY => 'GGY',
            self::NUMERIC_KEY => '831',
            self::INSEE_KEY => '99132',
            self::CURRENCY_KEY => [
                'GBP',
            ],
        ],
        [
            self::NAME_KEY => 'GUINEA',
            self::ALPHA2_KEY => 'GN',
            self::ALPHA3_KEY => 'GIN',
            self::NUMERIC_KEY => '324',
            self::INSEE_KEY => '99330',
            self::CURRENCY_KEY => [
                'GNF',
            ],
        ],
        [
            self::NAME_KEY => 'GUINEA-BISSAU',
            self::ALPHA2_KEY => 'GW',
            self::ALPHA3_KEY => 'GNB',
            self::NUMERIC_KEY => '624',
            self::INSEE_KEY => '99392',
            self::CURRENCY_KEY => [
                'XOF',
            ],
        ],
        [
            self::NAME_KEY => 'GUYANA',
            self::ALPHA2_KEY => 'GY',
            self::ALPHA3_KEY => 'GUY',
            self::NUMERIC_KEY => '328',
            self::INSEE_KEY => '99428',
            self::CURRENCY_KEY => [
                'GYD',
            ],
        ],
        [
            self::NAME_KEY => 'HAITI',
            self::ALPHA2_KEY => 'HT',
            self::ALPHA3_KEY => 'HTI',
            self::NUMERIC_KEY => '332',
            self::INSEE_KEY => '99410',
            self::CURRENCY_KEY => [
                'HTG',
            ],
        ],
        [
            self::NAME_KEY => 'HEARD ISLAND AND MCDONALD ISLANDS',
            self::ALPHA2_KEY => 'HM',
            self::ALPHA3_KEY => 'HMD',
            self::NUMERIC_KEY => '334',
            self::INSEE_KEY => '99501',
            self::CURRENCY_KEY => [
                'AUD',
            ],
        ],
        [
            self::NAME_KEY => 'HOLY SEE',
            self::ALPHA2_KEY => 'VA',
            self::ALPHA3_KEY => 'VAT',
            self::NUMERIC_KEY => '336',
            self::INSEE_KEY => '99129',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'HONDURAS',
            self::ALPHA2_KEY => 'HN',
            self::ALPHA3_KEY => 'HND',
            self::NUMERIC_KEY => '340',
            self::INSEE_KEY => '99411',
            self::CURRENCY_KEY => [
                'HNL',
            ],
        ],
        [
            self::NAME_KEY => 'HONG KONG',
            self::ALPHA2_KEY => 'HK',
            self::ALPHA3_KEY => 'HKG',
            self::NUMERIC_KEY => '344',
            self::INSEE_KEY => '99230',
            self::CURRENCY_KEY => [
                'HKD',
            ],
        ],
        [
            self::NAME_KEY => 'HUNGARY',
            self::ALPHA2_KEY => 'HU',
            self::ALPHA3_KEY => 'HUN',
            self::NUMERIC_KEY => '348',
            self::INSEE_KEY => '99112',
            self::CURRENCY_KEY => [
                'HUF',
            ],
        ],
        [
            self::NAME_KEY => 'ICELAND',
            self::ALPHA2_KEY => 'IS',
            self::ALPHA3_KEY => 'ISL',
            self::NUMERIC_KEY => '352',
            self::INSEE_KEY => '99102',
            self::CURRENCY_KEY => [
                'ISK',
            ],
        ],
        [
            self::NAME_KEY => 'INDIA',
            self::ALPHA2_KEY => 'IN',
            self::ALPHA3_KEY => 'IND',
            self::NUMERIC_KEY => '356',
            self::INSEE_KEY => '99223',
            self::CURRENCY_KEY => [
                'INR',
            ],
        ],
        [
            self::NAME_KEY => 'INDONESIA',
            self::ALPHA2_KEY => 'ID',
            self::ALPHA3_KEY => 'IDN',
            self::NUMERIC_KEY => '360',
            self::INSEE_KEY => '99231',
            self::CURRENCY_KEY => [
                'IDR',
            ],
        ],
        [
            self::NAME_KEY => 'IRAN (ISLAMIC REPUBLIC OF)',
            self::ALPHA2_KEY => 'IR',
            self::ALPHA3_KEY => 'IRN',
            self::NUMERIC_KEY => '364',
            self::INSEE_KEY => '99204',
            self::CURRENCY_KEY => [
                'IRR',
            ],
        ],
        [
            self::NAME_KEY => 'IRAQ',
            self::ALPHA2_KEY => 'IQ',
            self::ALPHA3_KEY => 'IRQ',
            self::NUMERIC_KEY => '368',
            self::INSEE_KEY => '99203',
            self::CURRENCY_KEY => [
                'IQD',
            ],
        ],
        [
            self::NAME_KEY => 'IRELAND',
            self::ALPHA2_KEY => 'IE',
            self::ALPHA3_KEY => 'IRL',
            self::NUMERIC_KEY => '372',
            self::INSEE_KEY => '99136',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'ISLE OF MAN',
            self::ALPHA2_KEY => 'IM',
            self::ALPHA3_KEY => 'IMN',
            self::NUMERIC_KEY => '833',
            self::INSEE_KEY => '99132',
            self::CURRENCY_KEY => [
                'GBP',
            ],
        ],
        [
            self::NAME_KEY => 'ISRAEL',
            self::ALPHA2_KEY => 'IL',
            self::ALPHA3_KEY => 'ISR',
            self::NUMERIC_KEY => '376',
            self::INSEE_KEY => '99207',
            self::CURRENCY_KEY => [
                'ILS',
            ],
        ],
        [
            self::NAME_KEY => 'ITALY',
            self::ALPHA2_KEY => 'IT',
            self::ALPHA3_KEY => 'ITA',
            self::NUMERIC_KEY => '380',
            self::INSEE_KEY => '99127',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'JAMAICA',
            self::ALPHA2_KEY => 'JM',
            self::ALPHA3_KEY => 'JAM',
            self::NUMERIC_KEY => '388',
            self::INSEE_KEY => '99426',
            self::CURRENCY_KEY => [
                'JMD',
            ],
        ],
        [
            self::NAME_KEY => 'JAPAN',
            self::ALPHA2_KEY => 'JP',
            self::ALPHA3_KEY => 'JPN',
            self::NUMERIC_KEY => '392',
            self::INSEE_KEY => '99217',
            self::CURRENCY_KEY => [
                'JPY',
            ],
        ],
        [
            self::NAME_KEY => 'JERSEY',
            self::ALPHA2_KEY => 'JE',
            self::ALPHA3_KEY => 'JEY',
            self::NUMERIC_KEY => '832',
            self::INSEE_KEY => '99132',
            self::CURRENCY_KEY => [
                'GBP',
            ],
        ],
        [
            self::NAME_KEY => 'JORDAN',
            self::ALPHA2_KEY => 'JO',
            self::ALPHA3_KEY => 'JOR',
            self::NUMERIC_KEY => '400',
            self::INSEE_KEY => '99222',
            self::CURRENCY_KEY => [
                'JOD',
            ],
        ],
        [
            self::NAME_KEY => 'KAZAKHSTAN',
            self::ALPHA2_KEY => 'KZ',
            self::ALPHA3_KEY => 'KAZ',
            self::NUMERIC_KEY => '398',
            self::INSEE_KEY => '99256',
            self::CURRENCY_KEY => [
                'KZT',
            ],
        ],
        [
            self::NAME_KEY => 'KENYA',
            self::ALPHA2_KEY => 'KE',
            self::ALPHA3_KEY => 'KEN',
            self::NUMERIC_KEY => '404',
            self::INSEE_KEY => ['99332', '99307'],
            self::CURRENCY_KEY => [
                'KES',
            ],
        ],
        [
            self::NAME_KEY => 'KIRIBATI',
            self::ALPHA2_KEY => 'KI',
            self::ALPHA3_KEY => 'KIR',
            self::NUMERIC_KEY => '296',
            self::INSEE_KEY => '99513',
            self::CURRENCY_KEY => [
                'AUD',
            ],
        ],
        [
            self::NAME_KEY => 'KOREA (DEMOCRATIC PEOPLE\'S REPUBLIC OF)',
            self::ALPHA2_KEY => 'KP',
            self::ALPHA3_KEY => 'PRK',
            self::NUMERIC_KEY => '408',
            self::INSEE_KEY => ['99237', '99238'],
            self::CURRENCY_KEY => [
                'KPW',
            ],
        ],
        [
            self::NAME_KEY => 'KOREA (REPUBLIC OF)',
            self::ALPHA2_KEY => 'KR',
            self::ALPHA3_KEY => 'KOR',
            self::NUMERIC_KEY => '410',
            self::INSEE_KEY => '99239',
            self::CURRENCY_KEY => [
                'KRW',
            ],
        ],
        [
            self::NAME_KEY => 'KOSOVO',
            self::ALPHA2_KEY => 'KX',
            self::ALPHA3_KEY => 'XKX',
            self::NUMERIC_KEY => '',
            self::INSEE_KEY => '99157',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'KUWAIT',
            self::ALPHA2_KEY => 'KW',
            self::ALPHA3_KEY => 'KWT',
            self::NUMERIC_KEY => '414',
            self::INSEE_KEY => '99240',
            self::CURRENCY_KEY => [
                'KWD',
            ],
        ],
        [
            self::NAME_KEY => 'KYRGYZSTAN',
            self::ALPHA2_KEY => 'KG',
            self::ALPHA3_KEY => 'KGZ',
            self::NUMERIC_KEY => '417',
            self::INSEE_KEY => '99256',
            self::CURRENCY_KEY => [
                'KGS',
            ],
        ],
        [
            self::NAME_KEY => 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC',
            self::ALPHA2_KEY => 'LA',
            self::ALPHA3_KEY => 'LAO',
            self::NUMERIC_KEY => '418',
            self::INSEE_KEY => '99241',
            self::CURRENCY_KEY => [
                'LAK',
            ],
        ],
        [
            self::NAME_KEY => 'LATVIA',
            self::ALPHA2_KEY => 'LV',
            self::ALPHA3_KEY => 'LVA',
            self::NUMERIC_KEY => '428',
            self::INSEE_KEY => '99107',
            self::CURRENCY_KEY => [
                'LVL',
            ],
        ],
        [
            self::NAME_KEY => 'LEBANON',
            self::ALPHA2_KEY => 'LB',
            self::ALPHA3_KEY => 'LBN',
            self::NUMERIC_KEY => '422',
            self::INSEE_KEY => '99205',
            self::CURRENCY_KEY => [
                'LBP',
            ],
        ],
        [
            self::NAME_KEY => 'LESOTHO',
            self::ALPHA2_KEY => 'LS',
            self::ALPHA3_KEY => 'LSO',
            self::NUMERIC_KEY => '426',
            self::INSEE_KEY => '99348',
            self::CURRENCY_KEY => [
                'LSL',
                'ZAR',
            ],
        ],
        [
            self::NAME_KEY => 'LIBERIA',
            self::ALPHA2_KEY => 'LR',
            self::ALPHA3_KEY => 'LBR',
            self::NUMERIC_KEY => '430',
            self::INSEE_KEY => '99302',
            self::CURRENCY_KEY => [
                'LRD',
            ],
        ],
        [
            self::NAME_KEY => 'LIBYA',
            self::ALPHA2_KEY => 'LY',
            self::ALPHA3_KEY => 'LBY',
            self::NUMERIC_KEY => '434',
            self::INSEE_KEY => '99316',
            self::CURRENCY_KEY => [
                'LYD',
            ],
        ],
        [
            self::NAME_KEY => 'LIECHTENSTEIN',
            self::ALPHA2_KEY => 'LI',
            self::ALPHA3_KEY => 'LIE',
            self::NUMERIC_KEY => '438',
            self::INSEE_KEY => '99113',
            self::CURRENCY_KEY => [
                'CHF',
            ],
        ],
        [
            self::NAME_KEY => 'LITHUANIA',
            self::ALPHA2_KEY => 'LT',
            self::ALPHA3_KEY => 'LTU',
            self::NUMERIC_KEY => '440',
            self::INSEE_KEY => '99108',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'LUXEMBOURG',
            self::ALPHA2_KEY => 'LU',
            self::ALPHA3_KEY => 'LUX',
            self::NUMERIC_KEY => '442',
            self::INSEE_KEY => '99137',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'MACAO',
            self::ALPHA2_KEY => 'MO',
            self::ALPHA3_KEY => 'MAC',
            self::NUMERIC_KEY => '446',
            self::INSEE_KEY => '99232',
            self::CURRENCY_KEY => [
                'MOP',
            ],
        ],
        [
            self::NAME_KEY => 'MACEDONIA (THE FORMER YUGOSLAV REPUBLIC OF)',
            self::ALPHA2_KEY => 'MK',
            self::ALPHA3_KEY => 'MKD',
            self::NUMERIC_KEY => '807',
            self::INSEE_KEY => '99156',
            self::CURRENCY_KEY => [
                'MKD',
            ],
        ],
        [
            self::NAME_KEY => 'MADAGASCAR',
            self::ALPHA2_KEY => 'MG',
            self::ALPHA3_KEY => 'MDG',
            self::NUMERIC_KEY => '450',
            self::INSEE_KEY => '99333',
            self::CURRENCY_KEY => [
                'MGA',
            ],
        ],
        [
            self::NAME_KEY => 'MALAWI',
            self::ALPHA2_KEY => 'MW',
            self::ALPHA3_KEY => 'MWI',
            self::NUMERIC_KEY => '454',
            self::INSEE_KEY => '99334',
            self::CURRENCY_KEY => [
                'MWK',
            ],
        ],
        [
            self::NAME_KEY => 'MALAYSIA',
            self::ALPHA2_KEY => 'MY',
            self::ALPHA3_KEY => 'MYS',
            self::NUMERIC_KEY => '458',
            self::INSEE_KEY => ['99228', '99227'],
            self::CURRENCY_KEY => [
                'MYR',
            ],
        ],
        [
            self::NAME_KEY => 'MALDIVES',
            self::ALPHA2_KEY => 'MV',
            self::ALPHA3_KEY => 'MDV',
            self::NUMERIC_KEY => '462',
            self::INSEE_KEY => '99229',
            self::CURRENCY_KEY => [
                'MVR',
            ],
        ],
        [
            self::NAME_KEY => 'MALI',
            self::ALPHA2_KEY => 'ML',
            self::ALPHA3_KEY => 'MLI',
            self::NUMERIC_KEY => '466',
            self::INSEE_KEY => '99335',
            self::CURRENCY_KEY => [
                'XOF',
            ],
        ],
        [
            self::NAME_KEY => 'MALTA',
            self::ALPHA2_KEY => 'MT',
            self::ALPHA3_KEY => 'MLT',
            self::NUMERIC_KEY => '470',
            self::INSEE_KEY => '99144',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'MARSHALL ISLANDS',
            self::ALPHA2_KEY => 'MH',
            self::ALPHA3_KEY => 'MHL',
            self::NUMERIC_KEY => '584',
            self::INSEE_KEY => '99515',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'MARTINIQUE',
            self::ALPHA2_KEY => 'MQ',
            self::ALPHA3_KEY => 'MTQ',
            self::NUMERIC_KEY => '474',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'MAURITANIA',
            self::ALPHA2_KEY => 'MR',
            self::ALPHA3_KEY => 'MRT',
            self::NUMERIC_KEY => '478',
            self::INSEE_KEY => '99336',
            self::CURRENCY_KEY => [
                'MRO',
            ],
        ],
        [
            self::NAME_KEY => 'MAURITIUS',
            self::ALPHA2_KEY => 'MU',
            self::ALPHA3_KEY => 'MUS',
            self::NUMERIC_KEY => '480',
            self::INSEE_KEY => '99390',
            self::CURRENCY_KEY => [
                'MUR',
            ],
        ],
        [
            self::NAME_KEY => 'MAYOTTE',
            self::ALPHA2_KEY => 'YT',
            self::ALPHA3_KEY => 'MYT',
            self::NUMERIC_KEY => '175',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'MEXICO',
            self::ALPHA2_KEY => 'MX',
            self::ALPHA3_KEY => 'MEX',
            self::NUMERIC_KEY => '484',
            self::INSEE_KEY => '99405',
            self::CURRENCY_KEY => [
                'MXN',
            ],
        ],
        [
            self::NAME_KEY => 'MICRONESIA (FEDERATED STATES OF)',
            self::ALPHA2_KEY => 'FM',
            self::ALPHA3_KEY => 'FSM',
            self::NUMERIC_KEY => '583',
            self::INSEE_KEY => '99516',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'MOLDOVA (REPUBLIC OF)',
            self::ALPHA2_KEY => 'MD',
            self::ALPHA3_KEY => 'MDA',
            self::NUMERIC_KEY => '498',
            self::INSEE_KEY => '99132',
            self::CURRENCY_KEY => [
                'MDL',
            ],
        ],
        [
            self::NAME_KEY => 'MONACO',
            self::ALPHA2_KEY => 'MC',
            self::ALPHA3_KEY => 'MCO',
            self::NUMERIC_KEY => '492',
            self::INSEE_KEY => '99138',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'MONGOLIA',
            self::ALPHA2_KEY => 'MN',
            self::ALPHA3_KEY => 'MNG',
            self::NUMERIC_KEY => '496',
            self::INSEE_KEY => '99242',
            self::CURRENCY_KEY => [
                'MNT',
            ],
        ],
        [
            self::NAME_KEY => 'MONTENEGRO',
            self::ALPHA2_KEY => 'ME',
            self::ALPHA3_KEY => 'MNE',
            self::NUMERIC_KEY => '499',
            self::INSEE_KEY => '99120',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'MONTSERRAT',
            self::ALPHA2_KEY => 'MS',
            self::ALPHA3_KEY => 'MSR',
            self::NUMERIC_KEY => '500',
            self::INSEE_KEY => '99425',
            self::CURRENCY_KEY => [
                'XCD',
            ],
        ],
        [
            self::NAME_KEY => 'MOROCCO',
            self::ALPHA2_KEY => 'MA',
            self::ALPHA3_KEY => 'MAR',
            self::NUMERIC_KEY => '504',
            self::INSEE_KEY => ['99350', '99325'],
            self::CURRENCY_KEY => [
                'MAD',
            ],
        ],
        [
            self::NAME_KEY => 'MOZAMBIQUE',
            self::ALPHA2_KEY => 'MZ',
            self::ALPHA3_KEY => 'MOZ',
            self::NUMERIC_KEY => '508',
            self::INSEE_KEY => '99393',
            self::CURRENCY_KEY => [
                'MZN',
            ],
        ],
        [
            self::NAME_KEY => 'MYANMAR',
            self::ALPHA2_KEY => 'MM',
            self::ALPHA3_KEY => 'MMR',
            self::NUMERIC_KEY => '104',
            self::INSEE_KEY => '99224',
            self::CURRENCY_KEY => [
                'MMK',
            ],
        ],
        [
            self::NAME_KEY => 'NAMIBIA',
            self::ALPHA2_KEY => 'NA',
            self::ALPHA3_KEY => 'NAM',
            self::NUMERIC_KEY => '516',
            self::INSEE_KEY => '99311',
            self::CURRENCY_KEY => [
                'NAD',
                'ZAR',
            ],
        ],
        [
            self::NAME_KEY => 'NAURU',
            self::ALPHA2_KEY => 'NR',
            self::ALPHA3_KEY => 'NRU',
            self::NUMERIC_KEY => '520',
            self::INSEE_KEY => '99507',
            self::CURRENCY_KEY => [
                'AUD',
            ],
        ],
        [
            self::NAME_KEY => 'NEPAL',
            self::ALPHA2_KEY => 'NP',
            self::ALPHA3_KEY => 'NPL',
            self::NUMERIC_KEY => '524',
            self::INSEE_KEY => '99215',
            self::CURRENCY_KEY => [
                'NPR',
            ],
        ],
        [
            self::NAME_KEY => 'NETHERLANDS',
            self::ALPHA2_KEY => 'NL',
            self::ALPHA3_KEY => 'NLD',
            self::NUMERIC_KEY => '528',
            self::INSEE_KEY => ['99135', '99431'],
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'NEW CALEDONIA',
            self::ALPHA2_KEY => 'NC',
            self::ALPHA3_KEY => 'NCL',
            self::NUMERIC_KEY => '540',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'XPF',
            ],
        ],
        [
            self::NAME_KEY => 'NEW ZEALAND',
            self::ALPHA2_KEY => 'NZ',
            self::ALPHA3_KEY => 'NZL',
            self::NUMERIC_KEY => '554',
            self::INSEE_KEY => '99502',
            self::CURRENCY_KEY => [
                'NZD',
            ],
        ],
        [
            self::NAME_KEY => 'NICARAGUA',
            self::ALPHA2_KEY => 'NI',
            self::ALPHA3_KEY => 'NIC',
            self::NUMERIC_KEY => '558',
            self::INSEE_KEY => '99412',
            self::CURRENCY_KEY => [
                'NIO',
            ],
        ],
        [
            self::NAME_KEY => 'NIGER',
            self::ALPHA2_KEY => 'NE',
            self::ALPHA3_KEY => 'NER',
            self::NUMERIC_KEY => '562',
            self::INSEE_KEY => '99337',
            self::CURRENCY_KEY => [
                'XOF',
            ],
        ],
        [
            self::NAME_KEY => 'NIGERIA',
            self::ALPHA2_KEY => 'NG',
            self::ALPHA3_KEY => 'NGA',
            self::NUMERIC_KEY => '566',
            self::INSEE_KEY => '99338',
            self::CURRENCY_KEY => [
                'NGN',
            ],
        ],
        [
            self::NAME_KEY => 'NIUE',
            self::ALPHA2_KEY => 'NU',
            self::ALPHA3_KEY => 'NIU',
            self::NUMERIC_KEY => '570',
            self::INSEE_KEY => '99502',
            self::CURRENCY_KEY => [
                'NZD',
            ],
        ],
        [
            self::NAME_KEY => 'NORFOLK ISLAND',
            self::ALPHA2_KEY => 'NF',
            self::ALPHA3_KEY => 'NFK',
            self::NUMERIC_KEY => '574',
            self::INSEE_KEY => '99501',
            self::CURRENCY_KEY => [
                'AUD',
            ],
        ],
        [
            self::NAME_KEY => 'NORTHERN MARIANA ISLANDS',
            self::ALPHA2_KEY => 'MP',
            self::ALPHA3_KEY => 'MNP',
            self::NUMERIC_KEY => '580',
            self::INSEE_KEY => '99505',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'NORWAY',
            self::ALPHA2_KEY => 'NO',
            self::ALPHA3_KEY => 'NOR',
            self::NUMERIC_KEY => '578',
            self::INSEE_KEY => '99103',
            self::CURRENCY_KEY => [
                'NOK',
            ],
        ],
        [
            self::NAME_KEY => 'OMAN',
            self::ALPHA2_KEY => 'OM',
            self::ALPHA3_KEY => 'OMN',
            self::NUMERIC_KEY => '512',
            self::INSEE_KEY => '99250',
            self::CURRENCY_KEY => [
                'OMR',
            ],
        ],
        [
            self::NAME_KEY => 'PAKISTAN',
            self::ALPHA2_KEY => 'PK',
            self::ALPHA3_KEY => 'PAK',
            self::NUMERIC_KEY => '586',
            self::INSEE_KEY => '99213',
            self::CURRENCY_KEY => [
                'PKR',
            ],
        ],
        [
            self::NAME_KEY => 'PALAU',
            self::ALPHA2_KEY => 'PW',
            self::ALPHA3_KEY => 'PLW',
            self::NUMERIC_KEY => '585',
            self::INSEE_KEY => '99517',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'PALESTINE, STATE OF',
            self::ALPHA2_KEY => 'PS',
            self::ALPHA3_KEY => 'PSE',
            self::NUMERIC_KEY => '275',
            self::INSEE_KEY => '99261',
            self::CURRENCY_KEY => [
                'ILS',
            ],
        ],
        [
            self::NAME_KEY => 'PANAMA',
            self::ALPHA2_KEY => 'PA',
            self::ALPHA3_KEY => 'PAN',
            self::NUMERIC_KEY => '591',
            self::INSEE_KEY => '99413',
            self::CURRENCY_KEY => [
                'PAB',
            ],
        ],
        [
            self::NAME_KEY => 'PAPUA NEW GUINEA',
            self::ALPHA2_KEY => 'PG',
            self::ALPHA3_KEY => 'PNG',
            self::NUMERIC_KEY => '598',
            self::INSEE_KEY => '99510',
            self::CURRENCY_KEY => [
                'PGK',
            ],
        ],
        [
            self::NAME_KEY => 'PARAGUAY',
            self::ALPHA2_KEY => 'PY',
            self::ALPHA3_KEY => 'PRY',
            self::NUMERIC_KEY => '600',
            self::INSEE_KEY => '99421',
            self::CURRENCY_KEY => [
                'PYG',
            ],
        ],
        [
            self::NAME_KEY => 'PERU',
            self::ALPHA2_KEY => 'PE',
            self::ALPHA3_KEY => 'PER',
            self::NUMERIC_KEY => '604',
            self::INSEE_KEY => '99422',
            self::CURRENCY_KEY => [
                'PEN',
            ],
        ],
        [
            self::NAME_KEY => 'PHILIPPINES',
            self::ALPHA2_KEY => 'PH',
            self::ALPHA3_KEY => 'PHL',
            self::NUMERIC_KEY => '608',
            self::INSEE_KEY => '99220',
            self::CURRENCY_KEY => [
                'PHP',
            ],
        ],
        [
            self::NAME_KEY => 'PITCAIRN',
            self::ALPHA2_KEY => 'PN',
            self::ALPHA3_KEY => 'PCN',
            self::NUMERIC_KEY => '612',
            self::INSEE_KEY => '99503',
            self::CURRENCY_KEY => [
                'NZD',
            ],
        ],
        [
            self::NAME_KEY => 'POLAND',
            self::ALPHA2_KEY => 'PL',
            self::ALPHA3_KEY => 'POL',
            self::NUMERIC_KEY => '616',
            self::INSEE_KEY => '99122',
            self::CURRENCY_KEY => [
                'PLN',
            ],
        ],
        [
            self::NAME_KEY => 'PORTUGAL',
            self::ALPHA2_KEY => 'PT',
            self::ALPHA3_KEY => 'PRT',
            self::NUMERIC_KEY => '620',
            self::INSEE_KEY => ['99139', '99319'],
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'PUERTO RICO',
            self::ALPHA2_KEY => 'PR',
            self::ALPHA3_KEY => 'PRI',
            self::NUMERIC_KEY => '630',
            self::INSEE_KEY => '99432',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'QATAR',
            self::ALPHA2_KEY => 'QA',
            self::ALPHA3_KEY => 'QAT',
            self::NUMERIC_KEY => '634',
            self::INSEE_KEY => '99248',
            self::CURRENCY_KEY => [
                'QAR',
            ],
        ],
        [
            self::NAME_KEY => 'RÉUNION',
            self::ALPHA2_KEY => 'RE',
            self::ALPHA3_KEY => 'REU',
            self::NUMERIC_KEY => '638',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'ROMANIA',
            self::ALPHA2_KEY => 'RO',
            self::ALPHA3_KEY => 'ROU',
            self::NUMERIC_KEY => '642',
            self::INSEE_KEY => '99114',
            self::CURRENCY_KEY => [
                'RON',
            ],
        ],
        [
            self::NAME_KEY => 'RUSSIAN FEDERATION',
            self::ALPHA2_KEY => 'RU',
            self::ALPHA3_KEY => 'RUS',
            self::NUMERIC_KEY => '643',
            self::INSEE_KEY => ['99123', '99211', '99209', '99210'],
            self::CURRENCY_KEY => [
                'RUB',
            ],
        ],
        [
            self::NAME_KEY => 'RWANDA',
            self::ALPHA2_KEY => 'RW',
            self::ALPHA3_KEY => 'RWA',
            self::NUMERIC_KEY => '646',
            self::INSEE_KEY => '99340',
            self::CURRENCY_KEY => [
                'RWF',
            ],
        ],
        [
            self::NAME_KEY => 'SAINT BARTHÉLEMY',
            self::ALPHA2_KEY => 'BL',
            self::ALPHA3_KEY => 'BLM',
            self::NUMERIC_KEY => '652',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA',
            self::ALPHA2_KEY => 'SH',
            self::ALPHA3_KEY => 'SHN',
            self::NUMERIC_KEY => '654',
            self::INSEE_KEY => '99306',
            self::CURRENCY_KEY => [
                'SHP',
            ],
        ],
        [
            self::NAME_KEY => 'SAINT KITTS AND NEVIS',
            self::ALPHA2_KEY => 'KN',
            self::ALPHA3_KEY => 'KNA',
            self::NUMERIC_KEY => '659',
            self::INSEE_KEY => '99442',
            self::CURRENCY_KEY => [
                'XCD',
            ],
        ],
        [
            self::NAME_KEY => 'SAINT LUCIA',
            self::ALPHA2_KEY => 'LC',
            self::ALPHA3_KEY => 'LCA',
            self::NUMERIC_KEY => '662',
            self::INSEE_KEY => '99439',
            self::CURRENCY_KEY => [
                'XCD',
            ],
        ],
        [
            self::NAME_KEY => 'SAINT MARTIN (FRENCH PART)',
            self::ALPHA2_KEY => 'MF',
            self::ALPHA3_KEY => 'MAF',
            self::NUMERIC_KEY => '663',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'EUR',
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'SAINT PIERRE AND MIQUELON',
            self::ALPHA2_KEY => 'PM',
            self::ALPHA3_KEY => 'SPM',
            self::NUMERIC_KEY => '666',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'SAINT VINCENT AND THE GRENADINES',
            self::ALPHA2_KEY => 'VC',
            self::ALPHA3_KEY => 'VCT',
            self::NUMERIC_KEY => '670',
            self::INSEE_KEY => '99440',
            self::CURRENCY_KEY => [
                'XCD',
            ],
        ],
        [
            self::NAME_KEY => 'SAMOA',
            self::ALPHA2_KEY => 'WS',
            self::ALPHA3_KEY => 'WSM',
            self::NUMERIC_KEY => '882',
            self::INSEE_KEY => '99506',
            self::CURRENCY_KEY => [
                'WST',
            ],
        ],
        [
            self::NAME_KEY => 'SAN MARINO',
            self::ALPHA2_KEY => 'SM',
            self::ALPHA3_KEY => 'SMR',
            self::NUMERIC_KEY => '674',
            self::INSEE_KEY => '99128',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'SAO TOME AND PRINCIPE',
            self::ALPHA2_KEY => 'ST',
            self::ALPHA3_KEY => 'STP',
            self::NUMERIC_KEY => '678',
            self::INSEE_KEY => '99394',
            self::CURRENCY_KEY => [
                'STD',
            ],
        ],
        [
            self::NAME_KEY => 'SAUDI ARABIA',
            self::ALPHA2_KEY => 'SA',
            self::ALPHA3_KEY => 'SAU',
            self::NUMERIC_KEY => '682',
            self::INSEE_KEY =>99201,
            self::CURRENCY_KEY => [
                'SAR',
            ],
        ],
        [
            self::NAME_KEY => 'SENEGAL',
            self::ALPHA2_KEY => 'SN',
            self::ALPHA3_KEY => 'SEN',
            self::NUMERIC_KEY => '686',
            self::INSEE_KEY => '99341',
            self::CURRENCY_KEY => [
                'XOF',
            ],
        ],
        [
            self::NAME_KEY => 'SERBIA',
            self::ALPHA2_KEY => 'RS',
            self::ALPHA3_KEY => 'SRB',
            self::NUMERIC_KEY => '688',
            self::INSEE_KEY => '99121',
            self::CURRENCY_KEY => [
                'RSD',
            ],
        ],
        [
            self::NAME_KEY => 'SEYCHELLES',
            self::ALPHA2_KEY => 'SC',
            self::ALPHA3_KEY => 'SYC',
            self::NUMERIC_KEY => '690',
            self::INSEE_KEY => '99398',
            self::CURRENCY_KEY => [
                'SCR',
            ],
        ],
        [
            self::NAME_KEY => 'SIERRA LEONE',
            self::ALPHA2_KEY => 'SL',
            self::ALPHA3_KEY => 'SLE',
            self::NUMERIC_KEY => '694',
            self::INSEE_KEY => '99342',
            self::CURRENCY_KEY => [
                'SLL',
            ],
        ],
        [
            self::NAME_KEY => 'SINGAPORE',
            self::ALPHA2_KEY => 'SG',
            self::ALPHA3_KEY => 'SGP',
            self::NUMERIC_KEY => '702',
            self::INSEE_KEY => '99226',
            self::CURRENCY_KEY => [
                'SGD',
            ],
        ],
        [
            self::NAME_KEY => 'SINT MAARTEN (DUTCH PART)',
            self::ALPHA2_KEY => 'SX',
            self::ALPHA3_KEY => 'SXM',
            self::NUMERIC_KEY => '534',
            self::INSEE_KEY => '99445',
            self::CURRENCY_KEY => [
                'ANG',
            ],
        ],
        [
            self::NAME_KEY => 'SLOVAKIA',
            self::ALPHA2_KEY => 'SK',
            self::ALPHA3_KEY => 'SVK',
            self::NUMERIC_KEY => '703',
            self::INSEE_KEY => '99117',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'SLOVENIA',
            self::ALPHA2_KEY => 'SI',
            self::ALPHA3_KEY => 'SVN',
            self::NUMERIC_KEY => '705',
            self::INSEE_KEY => '99145',
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'SOLOMON ISLANDS',
            self::ALPHA2_KEY => 'SB',
            self::ALPHA3_KEY => 'SLB',
            self::NUMERIC_KEY => '090',
            self::INSEE_KEY => '99512',
            self::CURRENCY_KEY => [
                'SBD',
            ],
        ],
        [
            self::NAME_KEY => 'SOMALIA',
            self::ALPHA2_KEY => 'SO',
            self::ALPHA3_KEY => 'SOM',
            self::NUMERIC_KEY => '706',
            self::INSEE_KEY => '99318',
            self::CURRENCY_KEY => [
                'SOS',
            ],
        ],
        [
            self::NAME_KEY => 'SOUTH AFRICA',
            self::ALPHA2_KEY => 'ZA',
            self::ALPHA3_KEY => 'ZAF',
            self::NUMERIC_KEY => '710',
            self::INSEE_KEY => '99303',
            self::CURRENCY_KEY => [
                'ZAR',
            ],
        ],
        [
            self::NAME_KEY => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
            self::ALPHA2_KEY => 'GS',
            self::ALPHA3_KEY => 'SGS',
            self::NUMERIC_KEY => '239',
            self::INSEE_KEY => '99427',
            self::CURRENCY_KEY => [
                'GBP',
            ],
        ],
        [
            self::NAME_KEY => 'SOUTH SUDAN',
            self::ALPHA2_KEY => 'SS',
            self::ALPHA3_KEY => 'SSD',
            self::NUMERIC_KEY => '728',
            self::INSEE_KEY => '99349',
            self::CURRENCY_KEY => [
                'SSP',
            ],
        ],
        [
            self::NAME_KEY => 'SPAIN',
            self::ALPHA2_KEY => 'ES',
            self::ALPHA3_KEY => 'ESP',
            self::NUMERIC_KEY => '724',
            self::INSEE_KEY => ['99134', '99313'],
            self::CURRENCY_KEY => [
                'EUR',
            ],
        ],
        [
            self::NAME_KEY => 'SRI LANKA',
            self::ALPHA2_KEY => 'LK',
            self::ALPHA3_KEY => 'LKA',
            self::NUMERIC_KEY => '144',
            self::INSEE_KEY => '99235',
            self::CURRENCY_KEY => [
                'LKR',
            ],
        ],
        [
            self::NAME_KEY => 'SUDAN',
            self::ALPHA2_KEY => 'SD',
            self::ALPHA3_KEY => 'SDN',
            self::NUMERIC_KEY => '729',
            self::INSEE_KEY => '99343',
            self::CURRENCY_KEY => [
                'SDG',
            ],
        ],
        [
            self::NAME_KEY => 'SURINAME',
            self::ALPHA2_KEY => 'SR',
            self::ALPHA3_KEY => 'SUR',
            self::NUMERIC_KEY => '740',
            self::INSEE_KEY => '99437',
            self::CURRENCY_KEY => [
                'SRD',
            ],
        ],
        [
            self::NAME_KEY => 'SVALBARD AND JAN MAYEN',
            self::ALPHA2_KEY => 'SJ',
            self::ALPHA3_KEY => 'SJM',
            self::NUMERIC_KEY => '744',
            self::INSEE_KEY => '99103',
            self::CURRENCY_KEY => [
                'NOK',
            ],
        ],
        [
            self::NAME_KEY => 'SWEDEN',
            self::ALPHA2_KEY => 'SE',
            self::ALPHA3_KEY => 'SWE',
            self::NUMERIC_KEY => '752',
            self::INSEE_KEY => '99104',
            self::CURRENCY_KEY => [
                'SEK',
            ],
        ],
        [
            self::NAME_KEY => 'SWITZERLAND',
            self::ALPHA2_KEY => 'CH',
            self::ALPHA3_KEY => 'CHE',
            self::NUMERIC_KEY => '756',
            self::INSEE_KEY => '99140',
            self::CURRENCY_KEY => [
                'CHF',
            ],
        ],
        [
            self::NAME_KEY => 'SYRIAN ARAB REPUBLIC',
            self::ALPHA2_KEY => 'SY',
            self::ALPHA3_KEY => 'SYR',
            self::NUMERIC_KEY => '760',
            self::INSEE_KEY => '99206',
            self::CURRENCY_KEY => [
                'SYP',
            ],
        ],
        [
            self::NAME_KEY => 'TAIWAN (PROVINCE OF CHINA)',
            self::ALPHA2_KEY => 'TW',
            self::ALPHA3_KEY => 'TWN',
            self::NUMERIC_KEY => '158',
            self::INSEE_KEY => '99236',
            self::CURRENCY_KEY => [
                'TWD',
            ],
        ],
        [
            self::NAME_KEY => 'TAJIKISTAN',
            self::ALPHA2_KEY => 'TJ',
            self::ALPHA3_KEY => 'TJK',
            self::NUMERIC_KEY => '762',
            self::INSEE_KEY => '99259',
            self::CURRENCY_KEY => [
                'TJS',
            ],
        ],
        [
            self::NAME_KEY => 'TANZANIA, UNITED REPUBLIC OF',
            self::ALPHA2_KEY => 'TZ',
            self::ALPHA3_KEY => 'TZA',
            self::NUMERIC_KEY => '834',
            self::INSEE_KEY => ['99309', '99308'],
            self::CURRENCY_KEY => [
                'TZS',
            ],
        ],
        [
            self::NAME_KEY => 'THAILAND',
            self::ALPHA2_KEY => 'TH',
            self::ALPHA3_KEY => 'THA',
            self::NUMERIC_KEY => '764',
            self::INSEE_KEY => '99219',
            self::CURRENCY_KEY => [
                'THB',
            ],
        ],
        [
            self::NAME_KEY => 'TIMOR-LESTE',
            self::ALPHA2_KEY => 'TL',
            self::ALPHA3_KEY => 'TLS',
            self::NUMERIC_KEY => '626',
            self::INSEE_KEY => '99262',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'TOGO',
            self::ALPHA2_KEY => 'TG',
            self::ALPHA3_KEY => 'TGO',
            self::NUMERIC_KEY => '768',
            self::INSEE_KEY => '99345',
            self::CURRENCY_KEY => [
                'XOF',
            ],
        ],
        [
            self::NAME_KEY => 'TOKELAU',
            self::ALPHA2_KEY => 'TK',
            self::ALPHA3_KEY => 'TKL',
            self::NUMERIC_KEY => '772',
            self::INSEE_KEY => '99502',
            self::CURRENCY_KEY => [
                'NZD',
            ],
        ],
        [
            self::NAME_KEY => 'TONGA',
            self::ALPHA2_KEY => 'TO',
            self::ALPHA3_KEY => 'TON',
            self::NUMERIC_KEY => '776',
            self::INSEE_KEY => '99509',
            self::CURRENCY_KEY => [
                'TOP',
            ],
        ],
        [
            self::NAME_KEY => 'TRINIDAD AND TOBAGO',
            self::ALPHA2_KEY => 'TT',
            self::ALPHA3_KEY => 'TTO',
            self::NUMERIC_KEY => '780',
            self::INSEE_KEY => '99433',
            self::CURRENCY_KEY => [
                'TTD',
            ],
        ],
        [
            self::NAME_KEY => 'TUNISIA',
            self::ALPHA2_KEY => 'TN',
            self::ALPHA3_KEY => 'TUN',
            self::NUMERIC_KEY => '788',
            self::INSEE_KEY => '99351',
            self::CURRENCY_KEY => [
                'TND',
            ],
        ],
        [
            self::NAME_KEY => 'TURKEY',
            self::ALPHA2_KEY => 'TR',
            self::ALPHA3_KEY => 'TUR',
            self::NUMERIC_KEY => '792',
            self::INSEE_KEY => [99124, 99208],
            self::CURRENCY_KEY => [
                'TRY',
            ],
        ],
        [
            self::NAME_KEY => 'TURKMENISTAN',
            self::ALPHA2_KEY => 'TM',
            self::ALPHA3_KEY => 'TKM',
            self::NUMERIC_KEY => '795',
            self::INSEE_KEY => '99260',
            self::CURRENCY_KEY => [
                'TMT',
            ],
        ],
        [
            self::NAME_KEY => 'TURKS AND CAICOS ISLANDS',
            self::ALPHA2_KEY => 'TC',
            self::ALPHA3_KEY => 'TCA',
            self::NUMERIC_KEY => '796',
            self::INSEE_KEY => '99425',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'TUVALU',
            self::ALPHA2_KEY => 'TV',
            self::ALPHA3_KEY => 'TUV',
            self::NUMERIC_KEY => '798',
            self::INSEE_KEY => '99511',
            self::CURRENCY_KEY => [
                'AUD',
            ],
        ],
        [
            self::NAME_KEY => 'UGANDA',
            self::ALPHA2_KEY => 'UG',
            self::ALPHA3_KEY => 'UGA',
            self::NUMERIC_KEY => '800',
            self::INSEE_KEY => '99339',
            self::CURRENCY_KEY => [
                'UGX',
            ],
        ],
        [
            self::NAME_KEY => 'UKRAINE',
            self::ALPHA2_KEY => 'UA',
            self::ALPHA3_KEY => 'UKR',
            self::NUMERIC_KEY => '804',
            self::INSEE_KEY => '99155',
            self::CURRENCY_KEY => [
                'UAH',
            ],
        ],
        [
            self::NAME_KEY => 'UNITED ARAB EMIRATES',
            self::ALPHA2_KEY => 'AE',
            self::ALPHA3_KEY => 'ARE',
            self::NUMERIC_KEY => '784',
            self::INSEE_KEY => '99247',
            self::CURRENCY_KEY => [
                'AED',
            ],
        ],
        [
            self::NAME_KEY => 'UNITED KINGDOM OF GREAT BRITAIN AND NORTHERN IRELAND',
            self::ALPHA2_KEY => 'GB',
            self::ALPHA3_KEY => 'GBR',
            self::NUMERIC_KEY => '826',
            self::INSEE_KEY => ['99132', '99221', '99427', '99425'],
            self::CURRENCY_KEY => [
                'GBP',
            ],
        ],
        [
            self::NAME_KEY => 'UNITED STATES OF AMERICA',
            self::ALPHA2_KEY => 'US',
            self::ALPHA3_KEY => 'USA',
            self::NUMERIC_KEY => '840',
            self::INSEE_KEY => ['99432', '99404', '99504', '99505'],
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'UNITED STATES MINOR OUTLYING ISLANDS',
            self::ALPHA2_KEY => 'UM',
            self::ALPHA3_KEY => 'UMI',
            self::NUMERIC_KEY => '581',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'URUGUAY',
            self::ALPHA2_KEY => 'UY',
            self::ALPHA3_KEY => 'URY',
            self::NUMERIC_KEY => '858',
            self::INSEE_KEY => '99423',
            self::CURRENCY_KEY => [
                'UYU',
            ],
        ],
        [
            self::NAME_KEY => 'UZBEKISTAN',
            self::ALPHA2_KEY => 'UZ',
            self::ALPHA3_KEY => 'UZB',
            self::NUMERIC_KEY => '860',
            self::INSEE_KEY => '99258',
            self::CURRENCY_KEY => [
                'UZS',
            ],
        ],
        [
            self::NAME_KEY => 'VANUATU',
            self::ALPHA2_KEY => 'VU',
            self::ALPHA3_KEY => 'VUT',
            self::NUMERIC_KEY => '548',
            self::INSEE_KEY => '99514',
            self::CURRENCY_KEY => [
                'VUV',
            ],
        ],
        [
            self::NAME_KEY => 'VENEZUELA (BOLIVARIAN REPUBLIC OF)',
            self::ALPHA2_KEY => 'VE',
            self::ALPHA3_KEY => 'VEN',
            self::NUMERIC_KEY => '862',
            self::INSEE_KEY => '99424',
            self::CURRENCY_KEY => [
                'VEF',
            ],
        ],
        [
            self::NAME_KEY => 'VIET NAM',
            self::ALPHA2_KEY => 'VN',
            self::ALPHA3_KEY => 'VNM',
            self::NUMERIC_KEY => '704',
            self::INSEE_KEY => ['99243', '99244', '99245'],
            self::CURRENCY_KEY => [
                'VND',
            ],
        ],
        [
            self::NAME_KEY => 'VIRGIN ISLANDS (BRITISH)',
            self::ALPHA2_KEY => 'VG',
            self::ALPHA3_KEY => 'VGB',
            self::NUMERIC_KEY => '092',
            self::INSEE_KEY => '99425',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'VIRGIN ISLANDS (U.S.)',
            self::ALPHA2_KEY => 'VI',
            self::ALPHA3_KEY => 'VIR',
            self::NUMERIC_KEY => '850',
            self::INSEE_KEY => '99432',
            self::CURRENCY_KEY => [
                'USD',
            ],
        ],
        [
            self::NAME_KEY => 'WALLIS AND FUTUNA',
            self::ALPHA2_KEY => 'WF',
            self::ALPHA3_KEY => 'WLF',
            self::NUMERIC_KEY => '876',
            self::INSEE_KEY => '99100',
            self::CURRENCY_KEY => [
                'XPF',
            ],
        ],
        [
            self::NAME_KEY => 'WESTERN SAHARA',
            self::ALPHA2_KEY => 'EH',
            self::ALPHA3_KEY => 'ESH',
            self::NUMERIC_KEY => '732',
            self::INSEE_KEY => '99389',
            self::CURRENCY_KEY => [
                'MAD',
            ],
        ],
        [
            self::NAME_KEY => 'YEMEN',
            self::ALPHA2_KEY => 'YE',
            self::ALPHA3_KEY => 'YEM',
            self::NUMERIC_KEY => '887',
            self::INSEE_KEY => ['99251', '99233', '99202'],
            self::CURRENCY_KEY => [
                'YER',
            ],
        ],
        [
            self::NAME_KEY => 'ZAMBIA',
            self::ALPHA2_KEY => 'ZM',
            self::ALPHA3_KEY => 'ZMB',
            self::NUMERIC_KEY => '894',
            self::INSEE_KEY => '99346',
            self::CURRENCY_KEY => [
                'ZMW',
            ],
        ],
        [
            self::NAME_KEY => 'ZIMBABWE',
            self::ALPHA2_KEY => 'ZW',
            self::ALPHA3_KEY => 'ZWE',
            self::NUMERIC_KEY => '716',
            self::INSEE_KEY => '99310',
            self::CURRENCY_KEY => [
                'BWP',
                'EUR',
                'GBP',
                'USD',
                'ZAR',
            ],
        ],
    ];

}
