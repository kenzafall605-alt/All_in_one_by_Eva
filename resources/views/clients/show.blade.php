```blade
<x-layouts.app title="Détails du client">

    <div class="space-y-6">

        {{-- En-tête --}}
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide" style="color: #7b1e3a;">
                    Espace clients
                </p>

                <h1 class="mt-1 text-3xl font-bold text-gray-900">
                    Fiche du client
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Consultez les informations personnelles de votre client.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('clients.index') }}"
                   class="rounded-lg border border-gray-200 bg-white px-5 py-3 text-center text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                    ← Retour aux clients
                </a>

                <a href="{{ route('clients.edit', $client->id) }}"
                   class="rounded-lg px-5 py-3 text-center text-sm font-semibold text-white transition hover:opacity-90"
                   style="background-color: #7b1e3a;">
                    Modifier
                </a>
            </div>
        </div>

        {{-- Carte principale --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            {{-- En-tête bordeaux --}}
            <div class="px-6 py-8 text-white sm:px-8"
                 style="background-color: #7b1e3a;">

                <div class="flex items-center gap-4">

                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full border border-white/30 bg-white/15 text-2xl font-bold">
                        {{ strtoupper(substr($client->prenom, 0, 1)) }}{{ strtoupper(substr($client->nom, 0, 1)) }}
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold">
                            {{ $client->prenom }} {{ $client->nom }}
                        </h2>

                        <p class="mt-1 text-sm text-white/80">
                            Client n° {{ $client->id }}
                        </p>
                    </div>

                </div>
            </div>

            {{-- Informations personnelles --}}
            <div class="p-6 sm:p-8">

                <div class="mb-7 border-b border-gray-100 pb-4">
                    <h3 class="text-lg font-bold" style="color: #7b1e3a;">
                        Informations personnelles
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Coordonnées et renseignements du client.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-x-10 gap-y-7 sm:grid-cols-2">

                    {{-- Nom --}}
                    <div>
                        <p class="text-sm text-gray-500">Nom</p>
                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $client->nom }}
                        </p>
                    </div>

                    {{-- Prénom --}}
                    <div>
                        <p class="text-sm text-gray-500">Prénom</p>
                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $client->prenom }}
                        </p>
                    </div>

                    {{-- Téléphone --}}
                    <div>
                        <p class="text-sm text-gray-500">Téléphone</p>
                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $client->telephone }}
                        </p>
                    </div>

                    {{-- Email --}}
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $client->email ?? 'Non renseigné' }}
                        </p>
                    </div>

                    {{-- Date de naissance --}}
                    <div>
                        <p class="text-sm text-gray-500">Date de naissance</p>
                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $client->date_naissance ? $client->date_naissance->format('d/m/Y') : 'Non renseignée' }}
                        </p>
                    </div>

                    {{-- Sexe --}}
                    <div>
                        <p class="text-sm text-gray-500">Sexe</p>
                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $client->sexe ?? 'Non renseigné' }}
                        </p>
                    </div>

                    {{-- Adresse --}}
                    <div class="sm:col-span-2">
                        <p class="text-sm text-gray-500">Adresse</p>
                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $client->adresse ?? 'Non renseignée' }}
                        </p>
                    </div>

                    {{-- Notes --}}
                    <div class="sm:col-span-2">
                        <p class="text-sm text-gray-500">Notes</p>
                        <p class="mt-1 whitespace-pre-line font-semibold text-gray-900">
                            {{ $client->notes ?? 'Aucune note' }}
                        </p>
                    </div>

                    {{-- Statut --}}
                    <div>
                        <p class="text-sm text-gray-500">Statut du client</p>

                        @if ($client->statut)
                            <span class="mt-2 inline-flex rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                                Actif
                            </span>
                        @else
                            <span class="mt-2 inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                Inactif
                            </span>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>

</x-layouts.app>
```