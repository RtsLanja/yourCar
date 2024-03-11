<?php
function nombreEnLettres($nombre) {
    $unites = array('', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf');
    $dizaines = array('', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingt', 'quatre-vingt-dix');
    $groupes = array('', 'mille', 'million', 'milliard', 'billion');

    $resultat = '';

    $nombre = strrev((string) $nombre);
    $chiffres = str_split($nombre, 3);

    foreach ($chiffres as $key => $chiffre) {
        $chiffre = strrev($chiffre);
        $nombreLettres = '';

        if ($chiffre != '000') {
            $unite = (int) $chiffre % 10;
            $dizaine = (int) ($chiffre % 100 / 10);
            $centaine = (int) ($chiffre / 100);

            if ($centaine != 0) {
                if($unites[$centaine]=='un'){
                    $nombreLettres .= ' cent ';
                }
                else{
                    $nombreLettres .= $unites[$centaine] . ' cent ';
                }
            }

            if ($dizaine === 1 && $unite === 0) {
                $nombreLettres .= 'dix ';
            } elseif ($dizaine === 1 && $unite !== 0) {
                $nombreLettres .= $unites[$unite] . ' et ';
            } else {
                $nombreLettres .= $dizaines[$dizaine];
                if ($unite != 0) {
                    $nombreLettres .= '-';
                }
                $nombreLettres .= $unites[$unite];
            }

            $nombreLettres .= ' ' . $groupes[$key];
        }

        $resultat = $nombreLettres . ' ' . $resultat;
    }

    return trim($resultat);
}
?>