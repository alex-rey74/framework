<?php

namespace Entity;

use TheFramework\Application;
use TheFramework\Entity;

class News extends Entity{
    public $auteur;
    public $titre;
    public $contenu;
    public $dateAjout;
    public $dateModif;


    /**
     * Getter for Auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Setter for Auteur
     * @var string auteur
     *
     * @return self
     */
    public function setAuteur(string $auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }


    /**
     * Getter for Titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Setter for Titre
     * @var string titre
     *
     * @return self
     */
    public function setTitre(string $titre)
    {
        $this->titre = $titre;
        return $this;
    }


    /**
     * Getter for Contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Setter for Contenu
     * @var string contenu
     *
     * @return self
     */
    public function setContenu(string $contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }


    /**
     * Getter for DateAjout
     *
     * @return DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Setter for DateAjout
     * @var DateTime dateAjout
     *
     * @return self
     */
    public function setDateAjout(DateTime $dateAjout)
    {
        $this->dateAjout = $dateAjout;
        return $this;
    }


    /**
     * Getter for DateModif
     *
     * @return DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Setter for DateModif
     * @var DateTime dateModif
     *
     * @return self
     */
    public function setDateModif(DateTime $dateModif)
    {
        $this->dateModif = $dateModif;
        return $this;
    }


}