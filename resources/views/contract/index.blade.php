@extends('layouts.app')

@section('content')
    <h1>Liste des Contrats</h1>
    <a href="{{ route('contract.create') }}">Ajouter un Contrat</a>
    <table>
        <thead>
            <tr>
                <th>Box</th>
                <th>Locataire</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
                <tr>
                    <td>{{ $contract->box->name }}</td>
                    <td>{{ $contract->tenant->name }}</td>
                    <td>{{ $contract->start_date }}</td>
                    <td>
                        @if($contract->status === 'En cours')
                            <span style="color: green;">En cours</span>
                        @else
                            <span style="color: red;">{{ $contract->status }}</span> 
                            <!-- Ici, ça affichera la date de fin -->
                        @endif
                    </td>                    
                    <td>
                        <a href="{{ route('contract.show', $contract->id) }}">Voir</a>
                        <a href="{{ route('contract.edit', $contract->id) }}">Modifier</a>
                        <form action="{{ route('contract.destroy', $contract->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
