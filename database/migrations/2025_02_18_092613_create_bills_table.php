<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->decimal('paiement_montant', 10, 2); // Montant du paiement
            $table->date('paiement_date'); // Date du paiement
            $table->integer('periode_number'); // Numéro de la période
            $table->timestamps(); // Pour created_at et updated_at
            $table->foreignId('contract_id')->constrained()->onDelete('cascade'); // Référence au contrat
        });
    }

    public function down()
    {
        Schema::dropIfExists('bills');
    }

};
