<?php

return [
    'items' => [
        ['label' => 'Tableau de bord', 'icon' => 'layout-dashboard', 'route' => 'dashboard',            'pattern' => 'dashboard'],
        ['label' => 'Clients',         'icon' => 'users',            'route' => 'clients.index',        'pattern' => 'clients.*'],
        ['label' => 'Rendez-vous',     'icon' => 'calendar-days',    'route' => 'rendez-vous.index',    'pattern' => 'rendez-vous.*'],
        ['label' => 'Prestations',     'icon' => 'scissors',         'route' => 'services.index',       'pattern' => 'services.*'],
        ['label' => 'Caisse',          'icon' => 'wallet',           'route' => 'paiements.index',      'pattern' => 'paiements.*'],
        ['label' => 'Dépenses',        'icon' => 'receipt',          'route' => 'depenses.index',       'pattern' => 'depenses.*'],
        ['label' => 'Stock',           'icon' => 'package',          'route' => 'produits.index',       'pattern' => 'produits.*'],
        ['label' => 'Équipe',          'icon' => 'user-cog',         'route' => 'employes.index',       'pattern' => 'employes.*'],
        ['label' => 'Anniversaires',   'icon' => 'cake',             'route' => 'anniversaires.index',  'pattern' => 'anniversaires.*'],
        ['label' => 'Campagnes',       'icon' => 'message-circle',   'route' => 'campagnes.index',      'pattern' => 'campagnes.*'],
        ['label' => 'Fidélité',        'icon' => 'gift',             'route' => 'fidelite.index',       'pattern' => 'fidelite.*'],
        ['label' => 'Rapports',        'icon' => 'trending-up',      'route' => 'rapports.index',       'pattern' => 'rapports.*'],
        ['label' => 'Paramètres',      'icon' => 'settings',         'route' => 'parametres.index',     'pattern' => 'parametres.*'],
    ],
];