<!-- resources/views/box/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Liste des Boxes</h1>
    <a href="{{ route('box.create') }}" class="btn btn-primary">Créer une nouvelle Box</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Taille</th>
                <th>Prix</th>
                <th>Emplacement</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($boxes as $box)
                <tr>
                    <td>{{ $box->id }}</td>
                    <td>{{ $box->name }}</td>
                    <td>{{ $box->size }} m²</td>
                    <td>{{ $box->price }} €</td>
                    <td>{{ $box->location }}</td>
                    <td>{{ $box->status }}</td>
                    <td>
                        <a href="{{ route('box.show', $box->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('box.edit', $box->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('box.destroy', $box->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
