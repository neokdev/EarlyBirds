<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaxRefRepository")
 */
class TaxRef
{
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
}
