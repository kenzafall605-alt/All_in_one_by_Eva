
<x-layouts.app title="Gestion des clients">

    <div class="space-y-8">

        {{-- EN-TÊTE --}}
        <div class="relative overflow-hidden rounded-2xl border border-beige-200 bg-white px-6 py-7 shadow-sm sm:px-8">

            <div class="absolute right-0 top-0 h-40 w-40 rounded-full bg-beige-50 opacity-70 blur-3xl"></div>

            <div class="relative flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

                <div>
                    <div class="mb-3 flex items-center gap-2">
                        <span class="h-1.5 w-7 rounded-full bg-bordeaux-800"></span>
                        <p class="text-xs font-bold uppercase tracking-[0.22em] text-bordeaux-800">
                            Espace clients
                        </p>
                    </div>

                    <h1 class="text-3xl font-bold tracking-tight text-bordeaux-900">
                        Gestion des clients
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-stone-500">
                        Retrouvez et gérez facilement les clients de votre salon.
                        Un espace dédié à une relation client de qualité.
                    </p>
                </div>

                <a href="{{ route('clients.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-bordeaux-900 px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-bordeaux-900/15 transition duration-200 hover:-translate-y-0.5 hover:bg-bordeaux-800">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 5v14m7-7H5"/>
                    </svg>

                    Ajouter un client
                </a>

            </div>
        </div>


        {{-- STATISTIQUES --}}
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">

            {{-- Total --}}
            <div class="group rounded-2xl border border-beige-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-stone-500">
                            Total des clients
                        </p>
                        <p class="mt-4 text-3xl font-bold tracking-tight text-bordeaux-900">
                            {{ $totalClients }}
                        </p>
                        <p class="mt-1 text-xs text-stone-400">
                            Clients enregistrés
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-bordeaux-50 text-bordeaux-800 transition group-hover:bg-bordeaux-900 group-hover:text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m6-10a4 4 0 100-8 4 4 0 000 8zm10 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                        </svg>
                    </div>
                </div>

                <div class="mt-5 h-1 w-full overflow-hidden rounded-full bg-beige-100">
                    <div class="h-full w-3/4 rounded-full bg-bordeaux-800"></div>
                </div>
            </div>


            {{-- Actifs --}}
            <div class="group rounded-2xl border border-beige-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-stone-500">
                            Clients actifs
                        </p>
                        <p class="mt-4 text-3xl font-bold tracking-tight text-emerald-700">
                            {{ $clientsActifs }}
                        </p>
                        <p class="mt-1 text-xs text-stone-400">
                            Clients actifs dans le salon
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 transition group-hover:bg-emerald-700 group-hover:text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 12l4 4L19 6"/>
                        </svg>
                    </div>
                </div>

                <div class="mt-5 h-1 w-full overflow-hidden rounded-full bg-emerald-50">
                    <div class="h-full w-3/4 rounded-full bg-emerald-600"></div>
                </div>
            </div>


            {{-- Archivés --}}
            <div class="group rounded-2xl border border-beige-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-stone-500">
                            Clients archivés
                        </p>
                        <p class="mt-4 text-3xl font-bold tracking-tight text-stone-600">
                            {{ $clientsArchives }}
                        </p>
                        <p class="mt-1 text-xs text-stone-400">
                            Clients mis en archive
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-stone-100 text-stone-600 transition group-hover:bg-stone-700 group-hover:text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 7h16M5 7l1 13h12l1-13M9 7V4h6v3m-5 4v5m4-5v5"/>
                        </svg>
                    </div>
                </div>

                <div class="mt-5 h-1 w-full overflow-hidden rounded-full bg-stone-100">
                    <div class="h-full w-1/4 rounded-full bg-stone-500"></div>
                </div>
            </div>

        </div>


        {{-- RECHERCHE ET FILTRES --}}
        <form action="{{ route('clients.index') }}"
              method="GET"
              class="overflow-hidden rounded-2xl border border-beige-200 bg-white shadow-sm">

            <div class="border-b border-beige-100 px-6 py-5 sm:px-7">

                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-bordeaux-50 text-bordeaux-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" stroke-width="1.8">
                            <circle cx="11" cy="11" r="7"/>
                            <path stroke-linecap="round" d="m20 20-4-4"/>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-lg font-bold text-bordeaux-900">
                            Rechercher et filtrer
                        </h2>
                        <p class="mt-0.5 text-sm text-stone-500">
                            Affinez la liste selon vos critères.
                        </p>
                    </div>
                </div>

            </div>

            <div class="space-y-5 p-6 sm:p-7">

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

                    {{-- Recherche --}}
                    <div>
                        <label for="recherche" class="mb-2 block text-xs font-bold uppercase tracking-wider text-stone-600">
                            Rechercher un client
                        </label>

                        <div class="relative">
                            <svg class="absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-stone-400"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 stroke-width="1.8">
                                <circle cx="11" cy="11" r="7"/>
                                <path stroke-linecap="round" d="m20 20-4-4"/>
                            </svg>

                            <input
                                id="recherche"
                                type="text"
                                name="recherche"
                                value="{{ $recherche }}"
                                placeholder="Nom, prénom, téléphone..."
                                class="w-full rounded-xl border border-beige-300 bg-creme py-3 pl-10 pr-4 text-sm text-stone-800 outline-none transition placeholder:text-stone-400 focus:border-bordeaux-700 focus:bg-white focus:ring-4 focus:ring-bordeaux-100"
                            >
                        </div>
                    </div>


                    {{-- Sexe --}}
                    <div>
                        <label for="sexe" class="mb-2 block text-xs font-bold uppercase tracking-wider text-stone-600">
                            Sexe
                        </label>

                        <select
                            id="sexe"
                            name="sexe"
                            class="w-full rounded-xl border border-beige-300 bg-creme px-4 py-3 text-sm text-stone-800 outline-none transition focus:border-bordeaux-700 focus:bg-white focus:ring-4 focus:ring-bordeaux-100">

                            <option value="">Tous les sexes</option>
                            <option value="Femme" @selected($sexe === 'Femme')>Femme</option>
                            <option value="Homme" @selected($sexe === 'Homme')>Homme</option>
                            <option value="Enfant" @selected($sexe === 'Enfant')>Enfant</option>
                        </select>
                    </div>


                    {{-- Statut --}}
                    <div>
                        <label for="statut" class="mb-2 block text-xs font-bold uppercase tracking-wider text-stone-600">
                            Statut
                        </label>

                        <select
                            id="statut"
                            name="statut"
                            class="w-full rounded-xl border border-beige-300 bg-creme px-4 py-3 text-sm text-stone-800 outline-none transition focus:border-bordeaux-700 focus:bg-white focus:ring-4 focus:ring-bordeaux-100">

                            <option value="">Tous les statuts</option>
                            <option value="actif" @selected($statut === 'actif')>Actif</option>
                            <option value="inactif" @selected($statut === 'inactif')>Inactif</option>
                        </select>
                    </div>


                    {{-- Type de clients --}}
                    <div>
                        <label for="vue" class="mb-2 block text-xs font-bold uppercase tracking-wider text-stone-600">
                            Type de clients
                        </label>

                        <select
                            id="vue"
                            name="vue"
                            class="w-full rounded-xl border border-beige-300 bg-creme px-4 py-3 text-sm text-stone-800 outline-none transition focus:border-bordeaux-700 focus:bg-white focus:ring-4 focus:ring-bordeaux-100">

                            <option value="tous" @selected($vue === 'tous')>Clients enregistrés</option>
                            <option value="archives" @selected($vue === 'archives')>Clients archivés</option>
                        </select>
                    </div>

                </div>


                {{-- Boutons --}}
                <div class="flex flex-wrap items-center gap-3 border-t border-beige-100 pt-5">

                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-xl bg-bordeaux-900 px-6 py-3 text-sm font-semibold text-white shadow-md shadow-bordeaux-900/10 transition hover:bg-bordeaux-800">

                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 12h14m-6-6 6 6-6 6"/>
                        </svg>

                        Appliquer les filtres
                    </button>

                    <a href="{{ route('clients.index') }}"
                       class="inline-flex items-center gap-2 rounded-xl border border-beige-300 bg-white px-5 py-3 text-sm font-semibold text-stone-600 transition hover:border-bordeaux-300 hover:bg-beige-50 hover:text-bordeaux-900">

                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 4v5h5M5.5 15a7 7 0 1 0-.5-6"/>
                        </svg>

                        Réinitialiser
                    </a>

                </div>

            </div>

        </form>


        {{-- TABLEAU DES CLIENTS --}}
        <div class="overflow-hidden rounded-2xl border border-beige-200 bg-white shadow-sm">

            {{-- En-tête du tableau --}}
            <div class="flex flex-col gap-4 border-b border-beige-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">

                <div>
                    <div class="flex items-center gap-2">
                        <span class="h-6 w-1 rounded-full bg-bordeaux-800"></span>

                        <h2 class="text-xl font-bold text-bordeaux-900">
                            {{ $vue === 'archives' ? 'Clients archivés' : 'Liste des clients' }}
                        </h2>
                    </div>

                    <p class="mt-2 text-sm text-stone-500">
                        Consultez et gérez les informations de vos clients.
                    </p>
                </div>

                <div class="flex items-center gap-2 rounded-xl border border-beige-200 bg-creme px-4 py-2.5">
                    <span class="h-2 w-2 rounded-full bg-bordeaux-700"></span>
                    <span class="text-sm font-bold text-bordeaux-900">
                        {{ $clients->total() }} client(s)
                    </span>
                </div>

            </div>


            {{-- Contenu du tableau --}}
            <div class="overflow-x-auto">

                <table class="w-full min-w-[850px] text-left text-sm">

                    <thead class="bg-beige-50/70 text-[11px] uppercase tracking-[0.12em] text-bordeaux-800">

                        <tr>
                            <th class="px-6 py-4 font-bold">Client</th>
                            <th class="px-6 py-4 font-bold">Téléphone</th>
                            <th class="px-6 py-4 font-bold">Email</th>
                            <th class="px-6 py-4 font-bold">Statut</th>
                            <th class="px-6 py-4 font-bold">Actions</th>
                        </tr>

                    </thead>


                    <tbody class="divide-y divide-beige-100">

                        @forelse ($clients as $client)

                            <tr class="group transition duration-150 hover:bg-beige-50/60">

                                {{-- Identité --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full border border-bordeaux-100 bg-gradient-to-br from-beige-50 to-beige-100 text-sm font-bold tracking-wide text-bordeaux-900 shadow-sm">
                                            {{ strtoupper(substr($client->prenom, 0, 1)) }}{{ strtoupper(substr($client->nom, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="font-bold text-stone-800 transition group-hover:text-bordeaux-900">
                                                {{ $client->prenom }} {{ $client->nom }}
                                            </p>

                                            <p class="mt-1 text-xs text-stone-400">
                                                Référence #{{ $client->id }}
                                            </p>
                                        </div>

                                    </div>

                                </td>


                                {{-- Téléphone --}}
                                <td class="whitespace-nowrap px-6 py-5 text-stone-600">
                                    {{ $client->telephone ?: 'Non renseigné' }}
                                </td>


                                {{-- Email --}}
                                <td class="px-6 py-5 text-stone-600">
                                    {{ $client->email ?: 'Non renseigné' }}
                                </td>


                                {{-- Statut --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    @if ($client->trashed())

                                        <span class="inline-flex items-center gap-2 rounded-full border border-stone-200 bg-stone-100 px-3 py-1.5 text-xs font-semibold text-stone-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-stone-500"></span>
                                            Archivé
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Actif
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="px-6 py-5">

                                    @if (!$client->trashed())

                                        <div class="flex items-center gap-2">

                                            {{-- Voir --}}
                                            <a href="{{ route('clients.show', $client->id) }}"
                                               title="Consulter le client"
                                               class="inline-flex h-9 items-center justify-center gap-1.5 rounded-lg border border-beige-300 bg-white px-3 text-xs font-semibold text-stone-600 transition hover:border-bordeaux-300 hover:bg-bordeaux-50 hover:text-bordeaux-900">

                                                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/>
                                                    <circle cx="12" cy="12" r="3"/>
                                                </svg>

                                                Voir
                                            </a>


                                            {{-- Modifier --}}
                                            <a href="{{ route('clients.edit', $client->id) }}"
                                               title="Modifier le client"
                                               class="inline-flex h-9 items-center justify-center gap-1.5 rounded-lg bg-bordeaux-900 px-3 text-xs font-semibold text-white transition hover:bg-bordeaux-800">

                                                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="m16 4 4 4M4 20l4-.8L19 8a2.1 2.1 0 0 0-3-3L5 16l-1 4z"/>
                                                </svg>

                                                Modifier
                                            </a>


                                            {{-- Archiver --}}
                                            <form action="{{ route('clients.destroy', $client->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Voulez-vous vraiment archiver ce client ?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        title="Archiver le client"
                                                        class="inline-flex h-9 items-center justify-center gap-1.5 rounded-lg border border-amber-200 bg-amber-50 px-3 text-xs font-semibold text-amber-800 transition hover:bg-amber-100">

                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                         viewBox="0 0 24 24" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M4 7h16M5 7l1 13h12l1-13M9 7V4h6v3"/>
                                                    </svg>

                                                    Archiver
                                                </button>

                                            </form>

                                        </div>

                                    @else

                                        {{-- Restaurer --}}
                                        <form action="{{ route('clients.restore', $client->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    class="inline-flex h-9 items-center gap-2 rounded-lg border border-emerald-200 bg-emerald-50 px-4 text-xs font-semibold text-emerald-800 transition hover:bg-emerald-100">

                                                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M4 12a8 8 0 1 0 2.3-5.7L4 8.5M4 4v4.5h4.5"/>
                                                </svg>

                                                Restaurer
                                            </button>

                                        </form>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            {{-- Aucun résultat --}}
                            <tr>
                                <td colspan="5" class="px-6 py-20 text-center">

                                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-bordeaux-50 text-bordeaux-800">

                                        <svg class="h-8 w-8" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" stroke-width="1.5">
                                            <circle cx="11" cy="11" r="7"/>
                                            <path stroke-linecap="round" d="m20 20-4-4"/>
                                        </svg>

                                    </div>

                                    <h3 class="mt-5 text-base font-bold text-bordeaux-900">
                                        Aucun client trouvé
                                    </h3>

                                    <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-stone-500">
                                        Aucun client ne correspond à vos critères.
                                        Essayez de modifier votre recherche ou vos filtres.
                                    </p>

                                    <a href="{{ route('clients.index') }}"
                                       class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-bordeaux-800 underline-offset-4 hover:underline">
                                        Réinitialiser les filtres
                                    </a>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if ($clients->hasPages())

                <div class="border-t border-beige-200 bg-beige-50/50 px-6 py-5 sm:px-7">
                    {{ $clients->links() }}
                </div>

            @endif

        </div>

        {{-- Signature --}}
        <div class="flex items-center justify-center gap-2 pb-2 text-xs text-stone-400">
            <span class="h-px w-8 bg-beige-300"></span>
            <span>Gestion des clients · Excellence et élégance</span>
            <span class="h-px w-8 bg-beige-300"></span>
        </div>

    </div>

</x-layouts.app>
