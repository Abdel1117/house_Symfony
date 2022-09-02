<?php

namespace App\Entity;

use App\Repository\ApartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApartementRepository::class)]
class Apartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $m2;

    #[ORM\Column(type: 'string', length: 254)]
    private $adresse;

    #[ORM\Column(type: 'integer')]
    private $number_piece;

    #[ORM\Column(type: 'integer')]
    private $number_chamber;

    #[ORM\Column(type: 'integer')]
    private $price;

    #[ORM\ManyToMany(targetEntity: Tags::class, inversedBy: 'apartements_id')]
    private $category;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
   
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getM2(): ?int
    {
        return $this->m2;
    }

    public function setM2(int $m2): self
    {
        $this->m2 = $m2;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumberPiece(): ?int
    {
        return $this->number_piece;
    }

    public function setNumberPiece(int $number_piece): self
    {
        $this->number_piece = $number_piece;

        return $this;
    }

    public function getNumberChamber(): ?int
    {
        return $this->number_chamber;
    }

    public function setNumberChamber(int $number_chamber): self
    {
        $this->number_chamber = $number_chamber;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Tags>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Tags $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Tags $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }
}
