<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Vérifier les permissions de l'utilisateur connecté.
     */
    private function verifierPermission(string $permission): void
    {
        abort_unless(
            auth()->user()?->hasPermission($permission),
            403
        );
    }

    // Afficher la liste des clients
    public function index(Request $request)
    {
        $this->verifierPermission('clients.view');

        $recherche = trim($request->input('recherche', ''));

        $sexe = in_array($request->input('sexe'), ['Femme', 'Homme', 'Enfant'], true)
            ? $request->input('sexe')
            : '';

        $statut = in_array($request->input('statut'), ['actif', 'inactif'], true)
            ? $request->input('statut')
            : '';

        $vue = $request->input('vue') === 'archives' ? 'archives' : 'tous';

        $query = Client::query();

        // Afficher les clients archivés ou non archivés
        if ($vue === 'archives') {
            $query->onlyTrashed();
        }

        // Recherche par nom, prénom ou téléphone
        $query->when($recherche !== '', function ($query) use ($recherche) {
            $query->where(function ($q) use ($recherche) {
                $q->where('nom', 'LIKE', "%{$recherche}%")
                    ->orWhere('prenom', 'LIKE', "%{$recherche}%")
                    ->orWhere('telephone', 'LIKE', "%{$recherche}%");
            });
        });

        // Filtrer par sexe
        if ($sexe !== '') {
            $query->where('sexe', $sexe);
        }

        // Filtrer par statut
        if ($statut === 'actif') {
            $query->where('statut', true);
        } elseif ($statut === 'inactif') {
            $query->where('statut', false);
        }

        $clients = $query->latest()
            ->paginate(10)
            ->withQueryString();

        // Statistiques générales
        $totalClients = Client::count();

        $clientsActifs = Client::where('statut', true)->count();

        $clientsArchives = Client::onlyTrashed()->count();

        return view('clients.index', compact(
            'clients',
            'recherche',
            'sexe',
            'statut',
            'vue',
            'totalClients',
            'clientsActifs',
            'clientsArchives'
        ));
    }

    // Afficher la fiche d'un client
    public function show(Client $client)
    {
        $this->verifierPermission('clients.view');

        return view('clients.show', compact('client'));
    }

    // Afficher le formulaire de modification
    public function edit(Client $client)
    {
        $this->verifierPermission('clients.update');

        return view('clients.edit', compact('client'));
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        $this->verifierPermission('clients.create');

        return view('clients.create');
    }

    // Enregistrer un nouveau client
    public function store(StoreClientRequest $request)
    {
        $this->verifierPermission('clients.create');

        // Récupérer les données validées
        $validated = $request->validated();

        // Enregistrer le consentement
        $consentement = $request->boolean('consentement_promo');

        $validated['consentement_promo'] = $consentement;
        $validated['date_consentement'] = $consentement ? now() : null;
        $validated['date_retrait_consentement'] = null;
        $validated['statut'] = true;

        // Créer le client
        Client::create($validated);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client ajouté avec succès !');
    }

    // Modifier un client
    public function update(UpdateClientRequest $request, Client $client)
    {
        $this->verifierPermission('clients.update');

        // Récupérer les données validées
        $validated = $request->validated();

        // Comparer l'ancien et le nouveau consentement
        $ancienConsentement = (bool) $client->consentement_promo;
        $nouveauConsentement = $request->boolean('consentement_promo');

        $validated['consentement_promo'] = $nouveauConsentement;

        if (!$ancienConsentement && $nouveauConsentement) {
            // Le client donne son autorisation
            $validated['date_consentement'] = now();
            $validated['date_retrait_consentement'] = null;

        } elseif ($ancienConsentement && !$nouveauConsentement) {
            // Le client retire son autorisation
            $validated['date_retrait_consentement'] = now();
        }

        // Mettre à jour le client
        $client->update($validated);

        return redirect()
            ->route('clients.show', $client->id)
            ->with('success', 'Client modifié avec succès !');
    }

    // Archiver un client
    public function destroy(Client $client)
    {
        $this->verifierPermission('clients.archive');

        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client archivé avec succès !');
    }

    // Restaurer un client archivé
    public function restore($id)
    {
        $this->verifierPermission('clients.archive');

        $client = Client::onlyTrashed()->findOrFail($id);

        $client->restore();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client restauré avec succès !');
    }
}
