<?php

require_once 'controller.php';

$continuer = true;

do {
    echo "\n** Menu Distributeur **\n";
    echo "1 - Créer Wallet\n";
    echo "2 - Faire Dépôt\n";
    echo "0 - Quitter\n";
    
    $choix = readline("Votre choix : ");
    
    if ($choix == 0) {
        $continuer = false;
        echo "Au revoir !\n";
    } else {
        traiterChoix($choix);
    }
} while ($continuer);