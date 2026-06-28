<?php

require_once 'donnees.php';
require_once 'verificateur.php';
require_once 'services.php';

function traiterChoix($choix) {
    if ($choix == 1) {
        $tel = readline("Entrez le numéro : ");
        while (!leTelephoneEstUnique($tel)) {
            $tel = readline("Numéro déjà pris, entrez un autre numéro : ");
        }
        
        $nom = readline("Entrez le nom : ");
        while (empty($nom)) {
            $nom = readline("Le nom ne peut pas être vide : ");
        }
        
        $solde = readline("Entrez le solde initial : ");
        while ($solde < 0) {
            $solde = readline("Le solde doit être positif ou nul : ");
        }
        
        $code = readline("Entrez le code secret : ");
        while (empty($code)) {
            $code = readline("Le code ne peut pas être vide : ");
        }
        
        enregistrerPortefeuille($tel, $nom, $solde, $code);
        echo "Portefeuille créé avec succès.\n";
    } 
    elseif ($choix == 2) {
        $tel = readline("Numéro de téléphone : ");
        $portefeuille = trouverPortefeuilleParTelephone($tel);
        
        if ($portefeuille == null) {
            echo "Erreur : Portefeuille introuvable.\n";
        } else {
            $montant = readline("Montant du dépôt : ");
            while ($montant <= 0) {
                $montant = readline("Le montant doit être strictement positif : ");
            }
            
            effectuerDepot($tel, $montant);
            echo "Dépôt effectué avec succès.\n";
        }
    }
}