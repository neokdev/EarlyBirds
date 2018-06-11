<?php

namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Repository\TaxRefRepository")
 */
class TaxRef
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $regne;

    /**
     * @var string
     */
    private $phylum;

    /**
     * @var string
     */
    private $classe;

    /**
     * @var string
     */
    private $famille;

    /**
     * @var int
     */
    private $cdNom;

    /**
     * @var string
     */
    private $cdTaxsup;

    /**
     * @var int
     */
    private $cdRef;

    /**
     * @var string
     */
    private $rang;

    /**
     * @var string
     */
    private $lbNom;

    /**
     * @var string
     */
    private $nomComplet;

    /**
     * @var string
     */
    private $nomValide;

    /**
     * @var string
     */
    private $nomVern;

    /**
     * @var string
     */
    private $nomVernEng;

    /**
     * @var string
     */
    private $habitat;

    /**
     * @var string
     */
    private $fr;

    /**
     * @var string
     */
    private $gf;

    /**
     * @var string
     */
    private $mar;

    /**
     * @var string
     */
    private $gua;

    /**
     * @var string
     */
    private $sm;

    /**
     * @var string
     */
    private $spm;

    /**
     * @var string
     */
    private $may;

    /**
     * @var string
     */
    private $epa;

    /**
     * @var string
     */
    private $reu;

    /**
     * @var string
     */
    private $sa;

    /**
     * @var string
     */
    private $ta;

    /**
     * @var string
     */
    private $nc;

    /**
     * @var string
     */
    private $wf;

    /**
     * @var string
     */
    private $pf;

    /**
     * @var string
     */
    private $cli;

    /**
     * @var string
     */
    private $sb;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getRegne(): ?string
    {
        return $this->regne;
    }

    /**
     * @return null|string
     */
    public function getPhylum(): ?string
    {
        return $this->phylum;
    }

    /**
     * @return null|string
     */
    public function getClasse(): ?string
    {
        return $this->classe;
    }
    /**
     * @return null|string
     */
    public function getFamille(): ?string
    {
        return $this->famille;
    }

    /**
     * @return int|null
     */
    public function getCdNom(): ?int
    {
        return $this->cdNom;
    }

    /**
     * @return null|string
     */
    public function getCdTaxsup(): ?string
    {
        return $this->cdTaxsup;
    }

    /**
     * @return int|null
     */
    public function getCdRef(): ?int
    {
        return $this->cdRef;
    }

    /**
     * @return null|string
     */
    public function getRang(): ?string
    {
        return $this->rang;
    }

    /**
     * @return null|string
     */
    public function getLbNom(): ?string
    {
        return $this->lbNom;
    }

    /**
     * @return null|string
     */
    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    /**
     * @return null|string
     */
    public function getNomValide(): ?string
    {
        return $this->nomValide;
    }

    /**
     * @return null|string
     */
    public function getNomVern(): ?string
    {
        return $this->nomVern;
    }

    /**
     * @return null|string
     */
    public function getNomVernEng(): ?string
    {
        return $this->nomVernEng;
    }

    /**
     * @return null|string
     */
    public function getHabitat(): ?string
    {
        return $this->habitat;
    }

    /**
     * @return null|string
     */
    public function getFr(): ?string
    {
        return $this->fr;
    }

    /**
     * @return null|string
     */
    public function getGf(): ?string
    {
        return $this->gf;
    }

    /**
     * @return null|string
     */
    public function getMar(): ?string
    {
        return $this->mar;
    }

    /**
     * @return null|string
     */
    public function getGua(): ?string
    {
        return $this->gua;
    }

    /**
     * @return null|string
     */
    public function getSm(): ?string
    {
        return $this->sm;
    }

    /**
     * @return null|string
     */
    public function getSpm(): ?string
    {
        return $this->spm;
    }

    /**
     * @return null|string
     */
    public function getMay(): ?string
    {
        return $this->may;
    }

    /**
     * @return null|string
     */
    public function getEpa(): ?string
    {
        return $this->epa;
    }

    /**
     * @return null|string
     */
    public function getReu(): ?string
    {
        return $this->reu;
    }

    /**
     * @return null|string
     */
    public function getSa(): ?string
    {
        return $this->sa;
    }

    /**
     * @return null|string
     */
    public function getTa(): ?string
    {
        return $this->ta;
    }

    /**
     * @return null|string
     */
    public function getNc(): ?string
    {
        return $this->nc;
    }

    /**
     * @return null|string
     */
    public function getWf(): ?string
    {
        return $this->wf;
    }

    /**
     * @return null|string
     */
    public function getPf(): ?string
    {
        return $this->pf;
    }

    /**
     * @return null|string
     */
    public function getCli(): ?string
    {
        return $this->cli;
    }

    /**
     * @return null|string
     */
    public function getSb(): ?string
    {
        return $this->sb;
    }
}
