<?php

namespace App\Entity;

use App\Entity\Traits\BoBlameable;
use App\Entity\Traits\Timestampable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Swagger\Annotations as SWG;

/**
 * @ORM\Table(name="help",indexes={@ORM\Index(name="search_help_idx", columns={"subject", "page"})})
 * @ORM\Entity(repositoryClass="App\Repository\HelpRepository")
 */
class Help
{
    use Timestampable, BoBlameable;

    public const PAGES = [];
    public const SUBJECTS = [];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"getHelp"})
     * @SWG\Property(example=1)
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Groups({"getHelp"})
     * @SWG\Property(example="btn1")
     * @var string
     */
    private $subject;

    /**
     * @ORM\Column(type="string")
     * @Groups({"getHelp"})
     * @SWG\Property(example="title 1")
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     * @Groups({"getHelp"})
     * @SWG\Property(example="Test 1")
     * @var string
     */
    private $page;

    /**
     * @ORM\Column(type="text")
     * @Groups({"getHelp"})
     * @SWG\Property(example="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>")
     * @var string
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $isActive = false;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPage(): ?string
    {
        return $this->page;
    }

    /**
     * @param string $page
     */
    public function setPage(string $page): void
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function toggleIsActive(): void
    {
        $this->isActive = !$this->isActive;
    }
}
