<?php

namespace App\Http\Requests;

use App\Support\PhoneNormalizer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use InvalidArgumentException;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $telephone = trim((string) $this->input('telephone', ''));
        $whatsapp = trim((string) $this->input('whatsapp', ''));

        try {
            if ($telephone !== '') {
                $telephone = PhoneNormalizer::normalize($telephone);
            }
        } catch (InvalidArgumentException $e) {
            // La validation affichera le message d'erreur.
        }

        try {
            if ($whatsapp !== '') {
                $whatsapp = PhoneNormalizer::normalize($whatsapp);
            } else {
                $whatsapp = null;
            }
        } catch (InvalidArgumentException $e) {
            // La validation affichera le message d'erreur.
        }

        $this->merge([
            'telephone' => $telephone,
            'whatsapp' => $whatsapp,
        ]);
    }

    public function rules(): array
    {
        $client = $this->route('client');

        $telephoneValide = function ($attribute, $value, $fail) {
            try {
                PhoneNormalizer::normalize($value);
            } catch (InvalidArgumentException $e) {
                $fail($e->getMessage());
            }
        };

        return [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],

            'telephone' => [
                'required',
                'string',
                'max:20',
                $telephoneValide,
                Rule::unique('clients', 'telephone')->ignore($client),
            ],

            'whatsapp' => [
                'nullable',
                'string',
                'max:20',
                $telephoneValide,
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('clients', 'email')->ignore($client),
            ],

            'date_naissance' => ['nullable', 'date'],
            'sexe' => ['nullable', 'in:Femme,Homme,Enfant'],
            'adresse' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
            'consentement_promo' => ['sometimes', 'boolean'],
        ];
    }
}