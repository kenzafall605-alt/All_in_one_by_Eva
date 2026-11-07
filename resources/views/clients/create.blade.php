
<x-layouts.app title="Ajouter un client">

    <x-page-header
        title="Ajouter un client"
        description="Enregistrez un nouveau client dans votre salon."
    />

    <div class="mt-6 max-w-5xl">

        {{-- Carte principale --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- En-tête de la carte --}}
            <div class="border-b border-slate-100 bg-rose-950 px-6 py-5">
                <h2 class="text-lg font-semibold text-white">
                    Nouveau client
                </h2>
                <p class="mt-1 text-sm text-rose-100">
                    Complétez les informations ci-dessous pour créer une fiche client.
                </p>
            </div>

            <form action="{{ route('clients.store') }}" method="POST" class="p-6 sm:p-8">
                @csrf

                {{-- Informations personnelles --}}
                <div class="mb-8">
                    <div class="mb-5">
                        <h3 class="text-base font-semibold text-slate-800">
                            Informations personnelles
                        </h3>
                        <p class="mt-1 text-sm text-slate-500">
                            Les informations générales du client.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        {{-- Nom --}}
                        <div>
                            <label for="nom" class="mb-2 block text-sm font-medium text-slate-700">
                                Nom <span class="text-rose-700">*</span>
                            </label>
                            <input
                                type="text"
                                id="nom"
                                name="nom"
                                value="{{ old('nom') }}"
                                placeholder="Ex : Fall"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-800 focus:bg-white focus:ring-4 focus:ring-rose-100"
                            >
                            @error('nom')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Prénom --}}
                        <div>
                            <label for="prenom" class="mb-2 block text-sm font-medium text-slate-700">
                                Prénom <span class="text-rose-700">*</span>
                            </label>
                            <input
                                type="text"
                                id="prenom"
                                name="prenom"
                                value="{{ old('prenom') }}"
                                placeholder="Ex : Awa"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-800 focus:bg-white focus:ring-4 focus:ring-rose-100"
                            >
                            @error('prenom')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Téléphone --}}
                        <div>
                            <label for="telephone" class="mb-2 block text-sm font-medium text-slate-700">
                                Téléphone <span class="text-rose-700">*</span>
                            </label>
                            <input
                                type="tel"
                                id="telephone"
                                name="telephone"
                                value="{{ old('telephone') }}"
                                placeholder="Ex : 77 000 00 00"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-800 focus:bg-white focus:ring-4 focus:ring-rose-100"
                            >
                            @error('telephone')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- WhatsApp --}}
                     <div>
                    <label for="whatsapp" class="mb-2 block text-sm font-medium text-slate-700">
                     Numéro WhatsApp
                    </label>

                 <input
        type="tel"
        id="whatsapp"
        name="whatsapp"
        value="{{ old('whatsapp') }}"
        placeholder="Ex : 77 000 00 00"
        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-800 focus:bg-white focus:ring-4 focus:ring-rose-100"
    >

    @error('whatsapp')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-slate-700">
                                Adresse e-mail
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Ex : awa@email.com"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-800 focus:bg-white focus:ring-4 focus:ring-rose-100"
                            >
                            @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Date de naissance --}}
                        <div>
                            <label for="date_naissance" class="mb-2 block text-sm font-medium text-slate-700">
                                Date de naissance
                            </label>
                            <input
                                type="date"
                                id="date_naissance"
                                name="date_naissance"
                                value="{{ old('date_naissance') }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-800 focus:bg-white focus:ring-4 focus:ring-rose-100"
                            >
                            @error('date_naissance')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Sexe --}}
                        <div>
                            <label for="sexe" class="mb-2 block text-sm font-medium text-slate-700">
                                Sexe
                            </label>
                            <select
                                id="sexe"
                                name="sexe"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-800 focus:bg-white focus:ring-4 focus:ring-rose-100"
                            >
                                <option value="">Sélectionner</option>
                                <option value="Femme" @selected(old('sexe') === 'Femme')>Femme</option>
                                <option value="Homme" @selected(old('sexe') === 'Homme')>Homme</option>
                                <option value="Enfant" @selected(old('sexe') === 'Enfant')>Enfant</option>
                            </select>
                            @error('sexe')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
 {{-- Informations complémentaires --}}
<div class="border-t border-slate-100 pt-7">

    <div class="mb-5">
        <h3 class="text-base font-semibold text-slate-800">
            Informations complémentaires
        </h3>
        <p class="mt-1 text-sm text-slate-500">
            Quelques détails supplémentaires sur le client.
        </p>
    </div>

    <div class="space-y-5">

        {{-- Adresse --}}
        <div>
            <label for="adresse" class="mb-2 block text-sm font-medium text-slate-700">
                Adresse
            </label>
            <textarea
                id="adresse"
                name="adresse"
                rows="2"
                placeholder="Adresse ou quartier du client..."
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-800 focus:bg-white focus:ring-4 focus:ring-rose-100"
            >{{ old('adresse') }}</textarea>
            @error('adresse')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Notes --}}
        <div>
            <label for="notes" class="mb-2 block text-sm font-medium text-slate-700">
                Notes
            </label>
            <textarea
                id="notes"
                name="notes"
                rows="3"
                placeholder="Préférences, remarques ou informations utiles..."
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-rose-800 focus:bg-white focus:ring-4 focus:ring-rose-100"
            >{{ old('notes') }}</textarea>
            @error('notes')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Consentement aux promotions --}}
        <div class="rounded-xl border border-rose-100 bg-rose-50 p-4">
            <label class="flex items-start gap-3">
                <input
                    type="checkbox"
                    name="consentement_promo"
                    value="1"
                    @checked(old('consentement_promo'))
                    class="mt-1 h-4 w-4 rounded border-slate-300 text-rose-900 focus:ring-rose-800"
                >

                <span>
                    <span class="block text-sm font-semibold text-slate-800">
                        Autorisation de recevoir les promotions
                    </span>
                    <span class="mt-1 block text-xs text-slate-600">
                        Le client accepte de recevoir les offres, réductions et actualités du salon par WhatsApp.
                    </span>
                </span>
            </label>
        </div>

    </div>
</div>

                {{-- Boutons --}}
<div style="display: flex; justify-content: flex-end; align-items: center; gap: 12px; border-top: 1px solid #f1f1f1; padding-top: 24px; margin-top: 32px;">

    <a
        href="{{ route('clients.index') }}"
        style="display: inline-flex; align-items: center; justify-content: center; padding: 12px 24px; border: 1px solid #cbd5e1; border-radius: 10px; color: #475569; text-decoration: none; font-size: 14px; font-weight: 600;"
    >
        Annuler
    </a>

    <button
        type="submit"
        style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important; align-items: center; justify-content: center; padding: 12px 24px; background-color: #7b1e3a !important; color: white !important; border: none; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer;"
    >
        Enregistrer le client
    </button>

</div>

            </form>
        </div>

        <p class="mt-4 text-xs text-slate-400">
            Les champs marqués d'un astérisque (*) sont obligatoires.
        </p>

    </div>

</x-layouts.app>
