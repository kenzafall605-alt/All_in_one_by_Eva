<x-layouts.app title="Tableau de bord">
    <x-page-header title="Bienvenue chez All in One by Eva"
                   subtitle="Les fondations de l'application sont en place." />

    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
        <x-stat-card label="Charte graphique" value="Bordeaux & beige" icon="sparkles" hint="Couleurs, polices et composants prêts" />
        <x-stat-card label="Navigation" value="Responsive" icon="layout-dashboard" hint="Barre latérale (PC) / menu coulissant (mobile)" />
        <x-stat-card label="Prochaine étape" value="Connexion" icon="lock" hint="Branche feature/auth-roles" />
    </div>

    <div class="card mt-8">
        <h2 class="text-lg font-semibold">Aperçu des boutons</h2>
        <div class="mt-4 flex flex-wrap gap-3">
            <button class="btn-primary">Enregistrer</button>
            <button class="btn-secondary">Annuler</button>
            <button class="btn-danger">Supprimer</button>
        </div>
        <div class="mt-6 max-w-sm">
            <label class="label" for="demo">Exemple de champ</label>
            <input id="demo" class="input" placeholder="Nom du client">
        </div>
    </div>
</x-layouts.app>