@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Générer des Factures</h1>

    <!-- Affichage des contrats qui n'ont pas encore de facture -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Contrat ID</th>
                <th>Nom du locataire</th>
                <th>Montant Mensuel</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
                <tr>
                    <td>{{ $contract->id }}</td>
                    <td>{{ $contract->tenant->name }}</td> <!-- Assurez-vous que la relation 'tenant' est définie dans le modèle Contract -->
                    <td>{{ $contract->monthly_price }} €</td>
                    <td>
                        <form action="{{ route('bill.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="contract_id" value="{{ $contract->id }}">
                            <input type="hidden" name="paiement_montant" value="{{ $contract->monthly_price }}">
                            <input type="hidden" name="payment_date" value="null"> <!-- Non payé initialement -->
                            <button type="submit" class="btn btn-success">Générer la Facture</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
