@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Contrat</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Box : {{ $contract->box->name }}</h5>
            <p class="card-text"><strong>Locataire :</strong> {{ $contract->tenant->name }}</p>
            <p class="card-text"><strong>Modèle de Contrat :</strong> {{ $contract->contractTemplate->name }}</p>
            <p class="card-text"><strong>Prix Mensuel :</strong> {{ $contract->monthly_price }} €</p>
            <p class="card-text"><strong>Date de Début :</strong> {{ $contract->start_date }}</p>
            <p class="card-text"><strong>Date de Fin :</strong> {{ $contract->end_date }}</p>
        </div>
    </div>



    <a href="{{ route('contract.index') }}" class="btn btn-secondary">Voir tous les contrats</a>
    <a href="{{ route('contract.edit', $contract->id) }}" class="btn btn-primary">Modifier</a>
    <a href="{{ route('contract.generate_pdf', $contract->id) }}" class="btn btn-success">Télécharger le contrat PDF</a>
</div>

    <h3>Contenu du Contrat</h3>

    <div class="contract-content">
        {!! $contractText !!} <!-- Affichage du contenu dynamique du contrat -->
    </div>

@endsection
