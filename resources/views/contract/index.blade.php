@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Contrats</h1>
    <a href="{{ route('contract.create') }}">Créer un contrat</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Box</th>
                <th>Locataire</th>
                <th>Prix Mensuel</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
                <tr>
                    <td>{{ $contract->box->name }}</td>
                    <td>{{ $contract->tenant->name }}</td>
                    <td>{{ $contract->monthly_price }} €</td>
                    <td>{{ $contract->start_date }}</td>
                    <td>{{ $contract->end_date }}</td>
                    <td>
                        <a href="{{ route('contract.show', $contract->id) }}">Voir ce contrat</a>
                        <a href="{{ route('contract.edit', $contract->id) }}">Modifier</a>
                        <form action="{{ route('contract.destroy', $contract->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce contrat ?')">Supprimer</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
