@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Factures</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Montant</th>
                <th>Date de Paiement</th>
                <th>Période</th>
                <th>Contrat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bills as $bill)
            <tr>
                <td>{{ $bill->id }}</td>
                <td>{{ number_format($bill->paiement_montant, 2) }} €</td>
                <td>{{ $bill->paiement_date ? $bill->paiement_date->format('d/m/Y') : 'Non payé' }}</td>
                <td>{{ $bill->periode_number }}</td>
                <td><a href="{{ route('contract.show', $bill->contract_id) }}">Voir le contrat</a></td>
                <td><a href="{{ route('bill.show', $bill->id) }}" class="btn btn-info">Voir</a></td>
                <td><a href="{{ route('bill.edit', $bill->id) }}" class="btn btn-primary">Modifier</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
