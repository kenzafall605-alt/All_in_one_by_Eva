
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('whatsapp', 20)->nullable()->after('telephone');

            $table->boolean('consentement_promo')
                ->default(false)
                ->after('whatsapp');

            $table->timestamp('date_consentement')->nullable();

            $table->timestamp('date_retrait_consentement')->nullable();

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropSoftDeletes();

            $table->dropColumn([
                'whatsapp',
                'consentement_promo',
                'date_consentement',
                'date_retrait_consentement',
            ]);
        });
    }
};
