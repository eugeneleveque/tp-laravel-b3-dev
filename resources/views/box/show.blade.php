<!-- resources/views/box/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Détails de la Box: {{ $box->name }}</h1>
    <p><strong>Taille:</strong> {{ $box->size }} m²</p>
    <p><strong>Prix:</strong> {{ $box->price }} €</p>
    <p><strong>Emplacement:</strong> {{ $box->location }}</p>
    <p><strong>Statut:</strong> {{ $box->status }}</p>

    <a href="{{ route('box.edit', $box->id) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('box.destroy', $box->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    <a href="{{ route('box.index') }}" class="btn btn-secondary">Retour à la liste</a>
@endsection
