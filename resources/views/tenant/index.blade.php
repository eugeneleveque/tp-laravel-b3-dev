@extends('layouts.app')

@section('content')
    <h1>Liste des Locataires</h1>
    <a href="{{ route('tenant.create') }}">Ajouter un Locataire</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Compte Bancaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tenants as $tenant)
                <tr>
                    <td><a href="{{ route('tenant.show', $tenant->id) }}">{{ $tenant->name }}</a></td>
                    <td>{{ $tenant->phone }}</td>
                    <td>{{ $tenant->email }}</td>
                    <td>{{ $tenant->address }}</td>
                    <td>{{ $tenant->bank_account }}</td>
                    <td>
                        <a href="{{ route('tenant.edit', $tenant->id) }}">Modifier</a>
                        <form action="{{ route('tenant.destroy', $tenant->id) }}" method="POST" style="display:inline;">
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