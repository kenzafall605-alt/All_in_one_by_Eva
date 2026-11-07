<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'whatsapp',
        'email',
        'date_naissance',
        'sexe',
        'adresse',
        'photo',
        'notes',
        'statut',
        'consentement_promo',
        'date_consentement',
        'date_retrait_consentement',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'statut' => 'boolean',
        'consentement_promo' => 'boolean',
        'date_consentement' => 'datetime',
        'date_retrait_consentement' => 'datetime',
    ];
}
