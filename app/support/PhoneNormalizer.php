<?php

namespace App\Support;

use InvalidArgumentException;

class PhoneNormalizer
{
    public static function normalize(string $phone): string
    {
        // Supprimer les espaces, tirets et autres caractères
        $number = preg_replace('/\D/', '', $phone);

        // Enlever le préfixe international 00
        if (str_starts_with($number, '00221')) {
            $number = substr($number, 5);
        } elseif (str_starts_with($number, '221')) {
            $number = substr($number, 3);
        }

        // Vérifier qu'il reste exactement 9 chiffres
        if (strlen($number) !== 9) {
            throw new InvalidArgumentException(
                'Le numéro doit contenir 9 chiffres après le préfixe +221.'
            );
        }

        return '+221' . $number;
    }
}