
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone', 20)->index();
            $table->string('email')->nullable()->unique();

            $table->date('date_naissance')->nullable();
            $table->string('sexe', 20)->nullable();

            $table->text('adresse')->nullable();
            $table->string('photo')->nullable();
            $table->text('notes')->nullable();

            $table->boolean('statut')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
