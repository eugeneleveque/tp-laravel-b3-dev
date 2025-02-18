@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la Facture #{{ $bill->id }}</h1>

    <ul>
        <li><strong>Montant:</strong> {{ number_format($bill->paiement_montant, 2) }} €</li>
        <li><strong>Date de Paiement:</strong> {{ $bill->paiement_date ? $bill->paiement_date->format('d/m/Y') : 'Non payé' }}</li>
        <li><strong>Période:</strong> {{ $bill->periode_number }}</li>
        <li><strong>Contrat associé:</strong> <a href="{{ route('contract.show', $bill->contract_id) }}">Voir le contrat</a></li>
    </ul>

    <a href="{{ route('bill.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
