<?php

class Assurance
{
    private $assurance_ID;
    private $name;
    private $logo;
    private $isDeleted;

    public function __construct($assurance_ID, $name, $logo, $isDeleted)
    {
        $this->assurance_ID = $assurance_ID;
        $this->name         = $name;
        $this->logo         = $logo;
        $this->isDeleted    = $isDeleted;
    }

    // Getters and Setters

    public function getAssurance_ID()
    {
        return $this->assurance_ID;
    }

    public function setAssurance_ID($assurance_ID)
    {
        $this->assurance_ID = $assurance_ID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }
}

?>
