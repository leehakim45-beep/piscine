<?php

require_once 'donnees.php';
require_once 'verificateur.php';

function effectuerDepot($numero, $montant) {
    global $portefeuilles;
    
    // On cherche l'index du portefeuille pour pouvoir le modifier
    foreach ($portefeuilles as $key => $portefeuille) {
        if ($portefeuille['numero'] == $numero) {
            $portefeuilles[$key]['solde'] += $montant;
            ajouterTransaction($numero, 'depot', $montant, 0);
            return true;
        }
    }
    return false;
}

function calculerFrais($montant) {
    if ($montant <= 10000) {
        return 200;
    } elseif ($montant <= 100000) {
        return 500;
    } else {
        $frais = $montant * 0.01;
        if ($frais > 5000) {
            return 5000;
        }
        return $frais;
    }
}