<?php

// Appel des différents fichier class
require_once("Class_challenger.php");
require_once("Class_ippo.php");

class Fight 
{
    // Propiétés pour la vie des boxers.
    public $_staminaIppo;
    public $_staminaChallenger;

    // Propriétés pour la chance de critique des boxers.
    public $_coupCritiqueIppo;
    public $_coupCritiqueChallenger;
    public $_coupCritique;
                                /*     // Baisse de vie de Ippo
                                    public function staminaIppo($ippo, $challenger)
                                    {
                                        $this->_staminaIppo = $ippo->getStamina() - $challenger->getStrength();
                                    }

                                    // Baisse de vie du Challenger
                                    public function staminaChallenger($challenger, $ippo)
                                    {
                                        $this->_staminaChallenger = $challenger->getStamina() - $ippo->getStrength();
                                    } */

    // La fonction combat
    public function fighting($ippo, $challenger)
    {
        // Pour le calcul de diminution des points de vie
        $this->_staminaIppo = $ippo->getStamina();
        $this->_staminaChallenger = $challenger->getStamina();
        var_dump($this->_staminaIppo);
        $strengthIppo = $ippo->getStrength();
        $strengthChallenger = $challenger->getStrength();



        
        // Les rounds (10 max) en boucle
        for($r = 1; $r<=10; $r++)
        {
            echo "Round ($r) \n";
            
            // Si les points de vie passe à zéro ou en dessous zéro : KO 
            if($this->_staminaIppo<=0 || $this->_staminaChallenger <=0 )
            {
                echo "Le combat est terminé \n"; 

                    if($this->_staminaIppo < $this->_staminaChallenger)
                    {
                        echo "Victoire de $challenger->_name !!! \n";
                    }
                    elseif($this->_staminaChallenger <= $this->_staminaIppo)
                    {
                        echo "Victoire de $ippo->_name !!! \n";
                    }
                    else
                    {
                        echo "C'est un match nul !!!";
                    }
                echo "Fin du Combat. \n";
                break; // Pour arrêter la boucle (fin du match)
            }

                // Paramètres des Coup Critiques (placés ici pour que la chance de critique change à chaque boucle)
                $this->_coupCritique = rand(1,10);
                $this->_coupCritiqueChallenger = rand(2,3);
                $this->_coupCritiqueIppo = rand(6,7);

                    if($ippo->getVitesse() > $challenger->getVitesse()) // Comparaison Vitesses Boxers si Ippo est plus rapide que le Challenger.
                    {

                        // Condition de coups critiques pour Ippo
                        if($this->_coupCritique === $this->_coupCritiqueIppo)
                        {
                            echo "$ippo->_name vient d'effectuer un coup critique !!! \n";
                        // Déroulement du combat pour les points de vie des deux Boxers
                        $this->_staminaChallenger = $this->_staminaChallenger - $ippo->_strength * 2; // Critique effectué
                        $this->_staminaIppo = $this->_staminaIppo - $challenger->_strength;
                        }
        
                        // Condition de coups critiques pour le Challenger
                        elseif($this->_coupCritique === $this->_coupCritiqueChallenger)
                        {
                            echo "$challenger->_name vient d'effectuer un coup critique !!! \n";
                            // Déroulement du combat pour les points de vie des deux Boxers
                        $this->_staminaChallenger = $this->_staminaChallenger - $ippo->_strength;
                        $this->_staminaIppo = $this->_staminaIppo - $challenger->_strength * 2; // Critique effectué
                        }
        
                        // Si aucun coups critique
                        else
                        {
                        // Déroulement du combat pour les points de vie des deux Boxers
                        $this->_staminaChallenger = $this->_staminaChallenger - $ippo->_strength;
                        $this->_staminaIppo = $this->_staminaIppo - $challenger->_strength;
                            echo " Les deux boxers se rendent coups pour coups !!! \n";
                        }

                        echo " Stamina de $challenger->_name " . $this->_staminaChallenger . " Stamina de Ippo " . $this->_staminaIppo . "\n";
                    }

                    else // Comparaison vitesses Boxers si le Challenger est plus rapide que Ippo
                    {
                        $this->_staminaIppo = $this->_staminaIppo - $challenger->_strength;
                        $this->_staminaChallenger = $this->_staminaChallenger - $ippo->_strength;

                        echo " Stamina de $challenger->_name " . $this->_staminaIppo . " Stamina de Ippo " . $this->_staminaChallenger;
                    }
        }
    }
}

// Objet de la class Fight
$fight = new Fight;
// Appel fonction fighting
echo $fight->fighting($ippo, $challenger); 

?>