<?php

namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Repository\TaxRefRepository")
 */
class TaxRef
{
    /**
     * @var UuidInterface
     */
    private $id;
    /**
     * @var string
     */
    private $gne;

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
    private $ordre;

    /**
     * @var string
     */
    private $famille;

    /**
     * @var string;
     */
    private $sousFamille;

    /**
     * @var string
     */
    private $group1Inpn;

    /**
     * @var string
     */
    private $group2Inpn;

    /**
     * @var string
     */
    private $tribu;

    /**
     * @var int
     */
    private $cdNom;

    /**
     * @var string
     */
    private $cdTaxsup;

    /**
     * @var string
     */
    private $cdSup;

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
    private $lbAuteur;

    /**
     * @var string
     */
    private $nomComplet;

    /**
     * @var string
     */
    private $nomCompletHtml;

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
    private $sb;

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
    private $taaf;

    /**
     * @var string
     */
    private $pf;

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
    private $cli;

    /**
     * @var string
     */
    private $url;

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @param UuidInterface $id
     */
    public function setId(UuidInterface $id): void
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * @return string
     */
    public function getGne(): string
    {
        return $this->gne;
    }

    /**
     * @param string $gne
     */
    public function setGne(string $gne): void
    {
        $this->gne = $gne;
    }

    /**
     * @return string
     */
    public function getPhylum(): string
    {
        return $this->phylum;
    }

    /**
     * @param string $phylum
     */
    public function setPhylum(string $phylum): void
    {
        $this->phylum = $phylum;
    }

    /**
     * @return string
     */
    public function getClasse(): string
    {
        return $this->classe;
    }

    /**
     * @param string $classe
     */
    public function setClasse(string $classe): void
    {
        $this->classe = $classe;
    }

    /**
     * @return string
     */
    public function getOrdre(): string
    {
        return $this->ordre;
    }

    /**
     * @param string $ordre
     */
    public function setOrdre(string $ordre): void
    {
        $this->ordre = $ordre;
    }

    /**
     * @return string
     */
    public function getFamille(): string
    {
        return $this->famille;
    }

    /**
     * @param string $famille
     */
    public function setFamille(string $famille): void
    {
        $this->famille = $famille;
    }

    /**
     * @return string
     */
    public function getSousFamille(): string
    {
        return $this->sousFamille;
    }

    /**
     * @param string $sousFamille
     */
    public function setSousFamille(string $sousFamille): void
    {
        $this->sousFamille = $sousFamille;
    }

    /**
     * @return string
     */
    public function getGroup1Inpn(): string
    {
        return $this->group1Inpn;
    }

    /**
     * @param string $group1Inpn
     */
    public function setGroup1Inpn(string $group1Inpn): void
    {
        $this->group1Inpn = $group1Inpn;
    }

    /**
     * @return string
     */
    public function getGroup2Inpn(): string
    {
        return $this->group2Inpn;
    }

    /**
     * @param string $group2Inpn
     */
    public function setGroup2Inpn(string $group2Inpn): void
    {
        $this->group2Inpn = $group2Inpn;
    }

    /**
     * @return string
     */
    public function getTribu(): string
    {
        return $this->tribu;
    }

    /**
     * @param string $tribu
     */
    public function setTribu(string $tribu): void
    {
        $this->tribu = $tribu;
    }

    /**
     * @return int
     */
    public function getCdNom(): int
    {
        return $this->cdNom;
    }

    /**
     * @param int $cdNom
     */
    public function setCdNom(int $cdNom): void
    {
        $this->cdNom = $cdNom;
    }

    /**
     * @return string
     */
    public function getCdTaxsup(): string
    {
        return $this->cdTaxsup;
    }

    /**
     * @param string $cdTaxsup
     */
    public function setCdTaxsup(string $cdTaxsup): void
    {
        $this->cdTaxsup = $cdTaxsup;
    }

    /**
     * @return string
     */
    public function getCdSup(): string
    {
        return $this->cdSup;
    }

    /**
     * @param string $cdSup
     */
    public function setCdSup(string $cdSup): void
    {
        $this->cdSup = $cdSup;
    }

    /**
     * @return int
     */
    public function getCdRef(): int
    {
        return $this->cdRef;
    }

    /**
     * @param int $cdRef
     */
    public function setCdRef(int $cdRef): void
    {
        $this->cdRef = $cdRef;
    }

    /**
     * @return string
     */
    public function getRang(): string
    {
        return $this->rang;
    }

    /**
     * @param string $rang
     */
    public function setRang(string $rang): void
    {
        $this->rang = $rang;
    }

    /**
     * @return string
     */
    public function getLbNom(): string
    {
        return $this->lbNom;
    }

    /**
     * @param string $lbNom
     */
    public function setLbNom(string $lbNom): void
    {
        $this->lbNom = $lbNom;
    }

    /**
     * @return string
     */
    public function getLbAuteur(): string
    {
        return $this->lbAuteur;
    }

    /**
     * @param string $lbAuteur
     */
    public function setLbAuteur(string $lbAuteur): void
    {
        $this->lbAuteur = $lbAuteur;
    }

    /**
     * @return string
     */
    public function getNomComplet(): string
    {
        return $this->nomComplet;
    }

    /**
     * @param string $nomComplet
     */
    public function setNomComplet(string $nomComplet): void
    {
        $this->nomComplet = $nomComplet;
    }

    /**
     * @return string
     */
    public function getNomCompletHtml(): string
    {
        return $this->nomCompletHtml;
    }

    /**
     * @param string $nomCompletHtml
     */
    public function setNomCompletHtml(string $nomCompletHtml): void
    {
        $this->nomCompletHtml = $nomCompletHtml;
    }

    /**
     * @return string
     */
    public function getNomValide(): string
    {
        return $this->nomValide;
    }

    /**
     * @param string $nomValide
     */
    public function setNomValide(string $nomValide): void
    {
        $this->nomValide = $nomValide;
    }

    /**
     * @return string
     */
    public function getNomVern(): string
    {
        return $this->nomVern;
    }

    /**
     * @param string $nomVern
     */
    public function setNomVern(string $nomVern): void
    {
        $this->nomVern = $nomVern;
    }

    /**
     * @return string
     */
    public function getNomVernEng(): string
    {
        return $this->nomVernEng;
    }

    /**
     * @param string $nomVernEng
     */
    public function setNomVernEng(string $nomVernEng): void
    {
        $this->nomVernEng = $nomVernEng;
    }

    /**
     * @return string
     */
    public function getHabitat(): string
    {
        return $this->habitat;
    }

    /**
     * @param string $habitat
     */
    public function setHabitat(string $habitat): void
    {
        $this->habitat = $habitat;
    }

    /**
     * @return string
     */
    public function getFr(): string
    {
        return $this->fr;
    }

    /**
     * @param string $fr
     */
    public function setFr(string $fr): void
    {
        $this->fr = $fr;
    }

    /**
     * @return string
     */
    public function getGf(): string
    {
        return $this->gf;
    }

    /**
     * @param string $gf
     */
    public function setGf(string $gf): void
    {
        $this->gf = $gf;
    }

    /**
     * @return string
     */
    public function getMar(): string
    {
        return $this->mar;
    }

    /**
     * @param string $mar
     */
    public function setMar(string $mar): void
    {
        $this->mar = $mar;
    }

    /**
     * @return string
     */
    public function getGua(): string
    {
        return $this->gua;
    }

    /**
     * @param string $gua
     */
    public function setGua(string $gua): void
    {
        $this->gua = $gua;
    }

    /**
     * @return string
     */
    public function getSm(): string
    {
        return $this->sm;
    }

    /**
     * @param string $sm
     */
    public function setSm(string $sm): void
    {
        $this->sm = $sm;
    }

    /**
     * @return string
     */
    public function getSb(): string
    {
        return $this->sb;
    }

    /**
     * @param string $sb
     */
    public function setSb(string $sb): void
    {
        $this->sb = $sb;
    }

    /**
     * @return string
     */
    public function getSpm(): string
    {
        return $this->spm;
    }

    /**
     * @param string $spm
     */
    public function setSpm(string $spm): void
    {
        $this->spm = $spm;
    }

    /**
     * @return string
     */
    public function getMay(): string
    {
        return $this->may;
    }

    /**
     * @param string $may
     */
    public function setMay(string $may): void
    {
        $this->may = $may;
    }

    /**
     * @return string
     */
    public function getEpa(): string
    {
        return $this->epa;
    }

    /**
     * @param string $epa
     */
    public function setEpa(string $epa): void
    {
        $this->epa = $epa;
    }

    /**
     * @return string
     */
    public function getReu(): string
    {
        return $this->reu;
    }

    /**
     * @param string $reu
     */
    public function setReu(string $reu): void
    {
        $this->reu = $reu;
    }

    /**
     * @return string
     */
    public function getSa(): string
    {
        return $this->sa;
    }

    /**
     * @param string $sa
     */
    public function setSa(string $sa): void
    {
        $this->sa = $sa;
    }

    /**
     * @return string
     */
    public function getTa(): string
    {
        return $this->ta;
    }

    /**
     * @param string $ta
     */
    public function setTa(string $ta): void
    {
        $this->ta = $ta;
    }

    /**
     * @return string
     */
    public function getTaaf(): string
    {
        return $this->taaf;
    }

    /**
     * @param string $taaf
     */
    public function setTaaf(string $taaf): void
    {
        $this->taaf = $taaf;
    }

    /**
     * @return string
     */
    public function getPf(): string
    {
        return $this->pf;
    }

    /**
     * @param string $pf
     */
    public function setPf(string $pf): void
    {
        $this->pf = $pf;
    }

    /**
     * @return string
     */
    public function getNc(): string
    {
        return $this->nc;
    }

    /**
     * @param string $nc
     */
    public function setNc(string $nc): void
    {
        $this->nc = $nc;
    }

    /**
     * @return string
     */
    public function getWf(): string
    {
        return $this->wf;
    }

    /**
     * @param string $wf
     */
    public function setWf(string $wf): void
    {
        $this->wf = $wf;
    }

    /**
     * @return string
     */
    public function getCli(): string
    {
        return $this->cli;
    }

    /**
     * @param string $cli
     */
    public function setCli(string $cli): void
    {
        $this->cli = $cli;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

}
