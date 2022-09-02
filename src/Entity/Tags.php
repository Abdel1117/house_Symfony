<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
class Tags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $tag_name;

    #[ORM\ManyToMany(targetEntity: Apartement::class, mappedBy: 'category')]
    private $apartements_id;

    public function __construct()
    {
        $this->apartements_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTagName(): ?string
    {
        return $this->tag_name;
    }

    public function setTagName(string $tag_name): self
    {
        $this->tag_name = $tag_name;

        return $this;
    }

    /**
     * @return Collection<int, Apartement>
     */
    public function getApartementsId(): Collection
    {
        return $this->apartements_id;
    }

    public function addApartementsId(Apartement $apartementsId): self
    {
        if (!$this->apartements_id->contains($apartementsId)) {
            $this->apartements_id[] = $apartementsId;
            $apartementsId->addCategory($this);
        }

        return $this;
    }

    public function removeApartementsId(Apartement $apartementsId): self
    {
        if ($this->apartements_id->removeElement($apartementsId)) {
            $apartementsId->removeCategory($this);
        }

        return $this;
    }
}
