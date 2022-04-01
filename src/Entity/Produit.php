<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ!")
     * @Assert\Length(max="50",maxMessage="Maximum 50 caractères!")
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ!")
     * @Assert\Length(max="10",maxMessage="Maximum 10 caractères!")
     * @ORM\Column(type="string", length=10)
     */
    private $reference;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ!")
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner ce champ!")
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAjout;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->dateAjout;
    }

    public function setDateAjout(\DateTimeInterface $dateAjout): self
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }
}
