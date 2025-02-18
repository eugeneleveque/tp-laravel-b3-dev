@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la Facture</h1>

    <!-- Afficher les messages de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de modification de la facture -->
    <form action="{{ route('bill.update', $bill->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="paiement_montant">Montant du Paiement (€)</label>
            <input type="number" step="0.01" class="form-control" id="paiement_montant" name="paiement_montant" value="{{ old('paiement_montant', $bill->paiement_montant) }}" required>
        </div>

        <div class="form-group">
            <label for="paiement_date">Date de Paiement</label>
            <input type="date" class="form-control" id="paiement_date" name="paiement_date" 
                value="{{ old('paiement_date', $bill->paiement_date ? $bill->paiement_date->format('Y-m-d') : '') }}">
            <small class="form-text text-muted">Laissez vide si la facture n'a pas encore été payée.</small>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour la facture</button>
    </form>

    <a href="{{ route('bill.index') }}" class="btn btn-secondary mt-3">Retour à la liste des factures</a>
</div>
@endsection
