<?php

namespace Lib\PDFBundle\PDFWrapper;

use TheCodingMachine\Gotenberg\Request;

abstract class APDFConfig
{
    /** @var string */
    protected $headerPath = '';

    /** @var string */
    protected $footerPath = '';

    /** @var string */
    protected $bodyPath = '';

    /** @var string[] */
    protected $listCss = [];
    /** @var string[] */
    protected $listImg = [];

    /** @var array */
    protected $paperSize = Request::A4;

    /** @var array */
    protected $margins = Request::NORMAL_MARGINS;

    /** @var string */
    protected $name = 'default';

    /**
     * @return string
     */
    public function getHeaderPath(): string
    {
        return $this->headerPath;
    }

    /**
     * @param string $headerPath
     */
    public function setHeaderPath(string $headerPath): void
    {
        $this->headerPath = $headerPath;
    }

    /**
     * @return string
     */
    public function getFooterPath(): ?string
    {
        return $this->footerPath;
    }

    /**
     * @param string $footerPath
     */
    public function setFooterPath(string $footerPath): void
    {
        $this->footerPath = $footerPath;
    }

    /**
     * @return string
     */
    public function getBodyPath(): string
    {
        return $this->bodyPath;
    }

    /**
     * @param string $bodyPath
     */
    public function setBodyPath(string $bodyPath): void
    {
        $this->bodyPath = $bodyPath;
    }
    /**
     * @return string[]
     */
    public function getListCss(): array
    {
        return $this->listCss;
    }

    /**
     * @param string[] $listCss
     */
    public function setListCss(array $listCss): void
    {
        $this->listCss = $listCss;
    }

    /**
     * @return string[]
     */
    public function getListImg(): array
    {
        return $this->listImg;
    }

    /**
     * @param string[] $listImg
     */
    public function setListImg(array $listImg): void
    {
        $this->listImg = $listImg;
    }

    /**
     * @return array
     */
    public function getPaperSize(): array
    {
        return $this->paperSize;
    }

    /**
     * @param array $paperSize
     */
    public function setPaperSize(array $paperSize): void
    {
        $this->paperSize = $paperSize;
    }

    /**
     * @return array
     */
    public function getMargins(): array
    {
        return $this->margins;
    }

    /**
     * @param array $margins
     */
    public function setMargins(array $margins): void
    {
        $this->margins = $margins;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
