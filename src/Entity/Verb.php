<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VerbRepository")
 * @UniqueEntity(fields={"present"}, message="There is already a verb with this name")
 */
class Verb
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $present;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $preterit;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $participe_present;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $participe_passe;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $participe_perfect;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $type_verb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $traduction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phonetique;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $irregular;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPresent(): ?string
    {
        return $this->present;
    }

    public function setPresent(string $present): self
    {
        $this->present = $present;

        return $this;
    }

    public function getPreterit(): ?string
    {
        return $this->preterit;
    }

    public function setPreterit(string $preterit): self
    {
        $this->preterit = $preterit;

        return $this;
    }


    public function getTraduction(): ?string
    {
        return $this->traduction;
    }

    public function setTraduction(string $traduction): self
    {
        $this->traduction = $traduction;

        return $this;
    }

    public function getPhonetique(): ?string
    {
        return $this->phonetique;
    }

    public function setPhonetique(?string $phonetique): self
    {
        $this->phonetique = $phonetique;

        return $this;
    }

    public function getIrregular(): ?bool
    {
        return $this->irregular;
    }

    public function setIrregular(?bool $irregular): self
    {
        $this->irregular = $irregular;

        return $this;
    }

    /**
     * Get the value of participe_present
     */ 
    public function getParticipePresent()
    {
        return $this->participe_present;
    }

    /**
     * Set the value of participe_present
     *
     * @return  self
     */ 
    public function setParticipePresent($participe_present)
    {
        $this->participe_present = $participe_present;

        return $this;
    }

    /**
     * Get the value of participe_passe
     */ 
    public function getParticipePasse()
    {
        return $this->participe_passe;
    }

    /**
     * Set the value of participe_passe
     *
     * @return  self
     */ 
    public function setParticipePasse($participe_passe)
    {
        $this->participe_passe = $participe_passe;

        return $this;
    }

    /**
     * Get the value of participe_perfect
     */ 
    public function getParticipePerfect()
    {
        return $this->participe_perfect;
    }

    /**
     * Set the value of participe_perfect
     *
     * @return  self
     */ 
    public function setParticipePerfect($participe_perfect)
    {
        $this->participe_perfect = $participe_perfect;

        return $this;
    }

}
