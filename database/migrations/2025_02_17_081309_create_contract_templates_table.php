<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contract_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom du modèle de contrat
            $table->json('content'); // Contenu JSON stocké par Editor.js
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Lien avec l'utilisateur qui a créé le modèle
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contract_templates');
    }
};
