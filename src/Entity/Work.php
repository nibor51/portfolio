<?php

namespace App\Entity;

use App\Repository\WorkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: WorkRepository::class)]
class Work
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['work:read', 'image_work:read'])]
    private $title;

    #[ORM\Column(type: 'text')]
    #[Groups(['work:read'])]
    private $description;

    #[ORM\Column(type: 'date')]
    #[Groups(['work:read'])]
    private $startDate;

    #[ORM\Column(type: 'date', nullable: true)]
    #[Groups(['work:read'])]
    private $endDate;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['work:read'])]
    private $link;

    #[ORM\ManyToMany(targetEntity: Tech::class)]
    #[Groups(['work:read'])]
    private $usedTech;

    #[ORM\OneToMany(mappedBy: 'work', targetEntity: ImageWork::class, orphanRemoval: true)]
    #[Groups(['work:read'])]
    private $images;

    public function __construct()
    {
        $this->usedTech = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection|Tech[]
     */
    public function getUsedTech(): Collection
    {
        return $this->usedTech;
    }

    public function addUsedTech(Tech $usedTech): self
    {
        if (!$this->usedTech->contains($usedTech)) {
            $this->usedTech[] = $usedTech;
        }

        return $this;
    }

    public function removeUsedTech(Tech $usedTech): self
    {
        $this->usedTech->removeElement($usedTech);

        return $this;
    }

    /**
     * @return Collection|ImageWork[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ImageWork $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setWork($this);
        }

        return $this;
    }

    public function removeImage(ImageWork $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getWork() === $this) {
                $image->setWork(null);
            }
        }

        return $this;
    }
}