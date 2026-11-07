
<x-layouts.app title="Modifier un client">

    <div class="mx-auto max-w-5xl space-y-8">

        {{-- EN-TÊTE --}}
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-rose-100 via-pink-50 to-purple-100 p-6 sm:p-8">
            <div class="relative z-10">
                <div class="mb-3 flex items-center gap-2">
                    <span class="rounded-full bg-white/80 px-4 py-1.5 text-xs font-bold uppercase tracking-widest text-rose-800 shadow-sm">
                        Espace clients
                    </span>
                    <span class="text-sm text-rose-400">/</span>
                    <span class="text-sm font-medium text-rose-700">Modification</span>
                </div>

                <h1 class="text-3xl font-extrabold tracking-tight text-rose-950 sm:text-4xl">
                    Modifier un client
                </h1>

                <p class="mt-2 max-w-xl text-sm leading-6 text-rose-800/75">
                    Prenez soin de votre fichier client en mettant à jour ses informations personnelles.
                </p>
            </div>

            <div class="pointer-events-none absolute -right-8 -top-12 h-48 w-48 rounded-full bg-white/30 blur-2xl"></div>
            <div class="pointer-events-none absolute -bottom-16 right-28 h-40 w-40 rounded-full bg-rose-300/20 blur-2xl"></div>
        </div>


        {{-- CARTE CLIENT --}}
        <div class="overflow-hidden rounded-3xl border border-rose-100 bg-white shadow-lg shadow-rose-100/40">

            <div class="relative overflow-hidden bg-gradient-to-r from-[#71364F] via-[#874563] to-[#A45D7B] px-6 py-7 text-white sm:px-8">

                <div class="relative z-10 flex flex-wrap items-center gap-4">

                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl border border-white/20 bg-white/15 text-2xl font-bold shadow-inner backdrop-blur-sm">
                        {{ strtoupper(substr($client->prenom, 0, 1)) }}{{ strtoupper(substr($client->nom, 0, 1)) }}
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-widest text-rose-100">
                            Fiche du client
                        </p>

                        <h2 class="mt-1 text-2xl font-bold">
                            {{ $client->prenom }} {{ $client->nom }}
                        </h2>

                        <p class="mt-1 text-sm text-rose-100">
                            Mise à jour des informations du client
                        </p>
                    </div>

                </div>

                <div class="pointer-events-none absolute -right-8 -top-16 h-48 w-48 rounded-full border-[25px] border-white/5"></div>
                <div class="pointer-events-none absolute -bottom-24 right-36 h-48 w-48 rounded-full bg-white/5"></div>

            </div>


            {{-- FORMULAIRE --}}
            <form action="{{ route('clients.update', $client->id) }}"
                  method="POST"
                  class="space-y-8 p-5 sm:p-8">

                @csrf
                @method('PUT')


                {{-- SECTION 1 : COORDONNÉES --}}
                <div>

                    <div class="mb-6 flex items-center gap-3 border-b border-rose-100 pb-4">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-rose-100 text-xl">
                            👤
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-gray-800">
                                Informations personnelles
                            </h3>
                            <p class="text-xs text-gray-500">
                                Identité et coordonnées du client
                            </p>
                        </div>

                    </div>


                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                        {{-- NOM --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">
                                Nom <span class="text-rose-600">*</span>
                            </label>

                            <input type="text"
                                   name="nom"
                                   value="{{ old('nom', $client->nom) }}"
                                   placeholder="Nom du client"
                                   class="w-full rounded-xl border border-rose-100 bg-[#FFFAFC] px-4 py-3 text-sm text-gray-800 outline-none transition duration-200 placeholder:text-gray-400 hover:border-rose-300 focus:border-rose-400 focus:bg-white focus:ring-4 focus:ring-rose-100">

                            @error('nom')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- PRENOM --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">
                                Prénom <span class="text-rose-600">*</span>
                            </label>

                            <input type="text"
                                   name="prenom"
                                   value="{{ old('prenom', $client->prenom) }}"
                                   placeholder="Prénom du client"
                                   class="w-full rounded-xl border border-rose-100 bg-[#FFFAFC] px-4 py-3 text-sm text-gray-800 outline-none transition duration-200 placeholder:text-gray-400 hover:border-rose-300 focus:border-rose-400 focus:bg-white focus:ring-4 focus:ring-rose-100">

                            @error('prenom')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- TELEPHONE --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">
                                Téléphone <span class="text-rose-600">*</span>
                            </label>

                            <input type="tel"
                                   name="telephone"
                                   value="{{ old('telephone', $client->telephone) }}"
                                   placeholder="Ex : 77 123 45 67"
                                   class="w-full rounded-xl border border-rose-100 bg-[#FFFAFC] px-4 py-3 text-sm text-gray-800 outline-none transition duration-200 placeholder:text-gray-400 hover:border-rose-300 focus:border-rose-400 focus:bg-white focus:ring-4 focus:ring-rose-100">

                            @error('telephone')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- WHATSAPP --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">
                                Numéro WhatsApp
                            </label>

                            <input type="tel"
                                   name="whatsapp"
                                   value="{{ old('whatsapp', $client->whatsapp) }}"
                                   placeholder="Ex : 78 123 45 67"
                                   class="w-full rounded-xl border border-rose-100 bg-[#FFFAFC] px-4 py-3 text-sm text-gray-800 outline-none transition duration-200 placeholder:text-gray-400 hover:border-rose-300 focus:border-rose-400 focus:bg-white focus:ring-4 focus:ring-rose-100">

                            @error('whatsapp')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- EMAIL --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">
                                Adresse e-mail
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email', $client->email) }}"
                                   placeholder="exemple@email.com"
                                   class="w-full rounded-xl border border-rose-100 bg-[#FFFAFC] px-4 py-3 text-sm text-gray-800 outline-none transition duration-200 placeholder:text-gray-400 hover:border-rose-300 focus:border-rose-400 focus:bg-white focus:ring-4 focus:ring-rose-100">

                            @error('email')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- DATE DE NAISSANCE --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">
                                Date de naissance
                            </label>

                            <input type="date"
                                   name="date_naissance"
                                   value="{{ old('date_naissance', $client->date_naissance?->format('Y-m-d')) }}"
                                   class="w-full rounded-xl border border-rose-100 bg-[#FFFAFC] px-4 py-3 text-sm text-gray-800 outline-none transition duration-200 hover:border-rose-300 focus:border-rose-400 focus:bg-white focus:ring-4 focus:ring-rose-100">

                            @error('date_naissance')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- SEXE --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">
                                Sexe
                            </label>

                            <select name="sexe"
                                    class="w-full rounded-xl border border-rose-100 bg-[#FFFAFC] px-4 py-3 text-sm text-gray-800 outline-none transition duration-200 hover:border-rose-300 focus:border-rose-400 focus:bg-white focus:ring-4 focus:ring-rose-100">

                                <option value="">Choisir une option</option>

                                <option value="Femme" @selected(old('sexe', $client->sexe) == 'Femme')>
                                    Femme
                                </option>

                                <option value="Homme" @selected(old('sexe', $client->sexe) == 'Homme')>
                                    Homme
                                </option>

                                <option value="Enfant" @selected(old('sexe', $client->sexe) == 'Enfant')>
                                    Enfant
                                </option>

                            </select>

                            @error('sexe')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                </div>


                {{-- SECTION 2 : ADRESSE ET NOTES --}}
                <div>

                    <div class="mb-6 flex items-center gap-3 border-b border-rose-100 pb-4">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-purple-100 text-xl">
                            ✨
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-gray-800">
                                Informations complémentaires
                            </h3>
                            <p class="text-xs text-gray-500">
                                Adresse et remarques sur le client
                            </p>
                        </div>

                    </div>


                    <div class="space-y-6">

                        {{-- ADRESSE --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">
                                Adresse
                            </label>

                            <textarea name="adresse"
                                      rows="2"
                                      placeholder="Adresse ou quartier du client..."
                                      class="w-full resize-y rounded-xl border border-rose-100 bg-[#FFFAFC] px-4 py-3 text-sm text-gray-800 outline-none transition duration-200 placeholder:text-gray-400 hover:border-rose-300 focus:border-rose-400 focus:bg-white focus:ring-4 focus:ring-rose-100">{{ old('adresse', $client->adresse) }}</textarea>

                            @error('adresse')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- NOTES --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">
                                Notes sur le client
                            </label>

                            <textarea name="notes"
                                      rows="3"
                                      placeholder="Préférences capillaires, habitudes, remarques particulières..."
                                      class="w-full resize-y rounded-xl border border-rose-100 bg-[#FFFAFC] px-4 py-3 text-sm text-gray-800 outline-none transition duration-200 placeholder:text-gray-400 hover:border-rose-300 focus:border-rose-400 focus:bg-white focus:ring-4 focus:ring-rose-100">{{ old('notes', $client->notes) }}</textarea>

                            @error('notes')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                </div>


                {{-- SECTION 3 : CONSENTEMENT --}}
                <div class="rounded-2xl border border-rose-200 bg-gradient-to-r from-rose-50 to-purple-50 p-5">

                    <label class="flex cursor-pointer items-start gap-4">

                        <input type="checkbox"
                               name="consentement_promo"
                               value="1"
                               @checked(old('consentement_promo', $client->consentement_promo))
                               class="mt-1 h-5 w-5 shrink-0 cursor-pointer rounded border-rose-300 text-rose-700 focus:ring-rose-400">

                        <span>
                            <span class="block text-sm font-bold text-rose-950">
                                Autorisation de recevoir les promotions
                            </span>

                            <span class="mt-1 block text-xs leading-5 text-gray-600">
                                Le client accepte de recevoir les offres, réductions et actualités du salon par WhatsApp.
                            </span>
                        </span>

                    </label>

                    @error('consentement_promo')
                        <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                    @enderror

                </div>


                {{-- BOUTONS D'ACTION --}}
                <div class="flex flex-col-reverse gap-3 border-t border-rose-100 pt-6 sm:flex-row sm:items-center sm:justify-end">

                    <a href="{{ route('clients.show', $client->id) }}"
                       class="inline-flex items-center justify-center rounded-xl border border-rose-200 bg-white px-6 py-3 text-sm font-semibold text-rose-800 transition duration-200 hover:bg-rose-50 hover:shadow-sm">

                        Annuler
                    </a>


                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#71364F] to-[#A45D7B] px-7 py-3 text-sm font-bold text-white shadow-lg shadow-rose-200 transition duration-200 hover:-translate-y-0.5 hover:from-[#59283D] hover:to-[#874563] hover:shadow-xl active:translate-y-0">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">

                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/>
                            <path d="M17 21v-8H7v8"/>
                            <path d="M7 3v5h8"/>

                        </svg>

                        Enregistrer les modifications

                    </button>

                </div>

            </form>

        </div>

        <p class="pb-4 text-center text-xs text-gray-400">
            Votre espace de gestion salon de coiffure ✨
        </p>

    </div>

</x-layouts.app>
