<?php
namespace App\Http\Requests;

use App\Support\PhoneNormalizer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use InvalidArgumentException;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Normaliser les numéros avant validation.
     */
    protected function prepareForValidation(): void
    {
        $telephone = trim((string) $this->input('telephone', ''));
        $whatsapp = trim((string) $this->input('whatsapp', ''));

        try {
            if ($telephone !== '') {
                $telephone = PhoneNormalizer::normalize($telephone);
            }
        } catch (InvalidArgumentException $e) {
            // La validation affichera le message approprié.
        }

        try {
            if ($whatsapp !== '') {
                $whatsapp = PhoneNormalizer::normalize($whatsapp);
            } else {
                $whatsapp = null;
            }
        } catch (InvalidArgumentException $e) {
            // La validation affichera le message approprié.
        }

        $this->merge([
            'telephone' => $telephone,
            'whatsapp' => $whatsapp,
        ]);
    }

    public function rules(): array
    {
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
                Rule::unique('clients', 'telephone'),
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
                Rule::unique('clients', 'email'),
            ],

            'date_naissance' => ['nullable', 'date'],
            'sexe' => ['nullable', 'in:Femme,Homme,Enfant'],
            'adresse' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
            'consentement_promo' => ['sometimes', 'boolean'],
        ];
    }
}
