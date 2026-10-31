<?php

namespace Tests\Feature;

use Tests\TestCase;

class LayoutTest extends TestCase
{
    public function test_la_page_d_accueil_affiche_le_nom_du_salon(): void
    {
        $this->withoutVite();

        $this->get('/')
            ->assertOk()
            ->assertSee('All in One')
            ->assertSee('by Eva');
    }

    public function test_les_modules_non_crees_sont_marques_bientot(): void
    {
        $this->withoutVite();

        $this->get('/')->assertSee('Bientôt');
    }
}