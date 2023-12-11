<?php

class Ippo
{
    // les 4 propriétés
    public $_name;
    public $_strength;
    public $_stamina;
    public $_vitesse;

    // Fonction __construct pour affecter les différentes propriétés
    public function __construct($name, $strength, $stamina, $vitesse)
    {
        $this->setName($name);
        $this->setStrength($strength);
        $this->setStamina($stamina);
        $this->setVitesse($vitesse);
    }

    // Affecter nom
    public function setName($name)
    {
        if(is_string($name))
        {
            return $this->_name = $name;
        }
    }

    // Récupérer nom
    public function getName()
    {
        return $this->_name;
    }

    // Affecter force
    public function setStrength($strength)
    {
        if(is_int($strength))
        {
            return $this->_strength = $strength;
        }
    }

    // Récupérer force
    public function getStrength()
    {
        return $this->_strength;
    }

    // Affecter points de vie
    public function setStamina($stamina)
    {
        if(is_int($stamina))
        {
            return $this->_stamina = $stamina;
        }
    }

    // Récupérer points de vie
    public function getStamina()
    {
        return $this->_stamina;
    }

    // Affecter vitesse
    public function setVitesse($vitesse)
    {
        if(is_int($vitesse))
        {
            return $this->_vitesse = $vitesse;
        }
    }

    // Récupérer vitesse
    public function getVitesse()
    {
        return $this->_vitesse;
    }

}

// Créer objet de la class Ippo
$ippo = new Ippo("Ippo", 1721, 20762, 90);

// echo $ippo->getVitesse();

?>

