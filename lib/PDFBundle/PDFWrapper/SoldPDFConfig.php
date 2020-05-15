<?php

namespace Lib\PDFBundle\PDFWrapper;

use TheCodingMachine\Gotenberg\Request;

class SoldPDFConfig extends APDFConfig
{

    private const PATH_SOLD_DIR = 'pdf/sold-cerfa';

    /**
     * Sold constructor.
     * @param string $immat
     */
    public function __construct(string $immat = '')
    {
        $this->bodyPath = self::PATH_SOLD_DIR . '/body.html.twig';
        $this->headerPath = '';
        $this->footerPath = '';
        $this->margins = Request::NO_MARGINS;
        $this->name = 'detail-vente-' . $immat;
        $this->listCss = [
            'sold-cerfa.css' => 'pdf/sold-cerfa/index', //a key => webpackname
            'common.css' => 'pdf/common', //a key => webpackname
        ];
        $this->listImg = [
            'ministere_de_interieur.svg' => 'build/img/pdf/sold-cerfa/ministere_de_interieur.svg' ,//a key => build path
            'sq.png' => 'build/img/pdf/sold-cerfa/sq.png' ,//a key => build path
            'logoAnts.png' => 'build/img/pdf/sold-cerfa/logoAnts.png' //a key => build path
        ];
    }
}
