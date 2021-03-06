<?php

namespace App\Entity;

use App\Repository\ImageWorkRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ImageWorkRepository::class)]
class ImageWork
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['work:read', 'image_work:read'])]
    private $alt;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['work:read', 'image_work:read'])]
    private $src;

    #[ORM\ManyToOne(targetEntity: Work::class, inversedBy: 'images')]
    #[Groups(['image_work:read'])]
    private $work;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function getWork(): ?Work
    {
        return $this->work;
    }

    public function setWork(?Work $work): self
    {
        $this->work = $work;

        return $this;
    }

}