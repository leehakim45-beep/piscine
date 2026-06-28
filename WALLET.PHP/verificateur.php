<?php

require_once 'donnees.php';

function leTelephoneEstUnique($numero) {
    $resultat = trouverPortefeuilleParTelephone($numero);
    
    if ($resultat == null) {
        return true;
    } else {
        return false;
    }
}

function leSoldeEstSuffisant($numero, $montantARetirer) {
    $portefeuille = trouverPortefeuilleParTelephone($numero);
    
    if ($portefeuille['solde'] >= $montantARetirer) {
        return true;
    } else {
        return false;
    }
}