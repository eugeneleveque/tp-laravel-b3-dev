<!-- resources/views/box/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Modifier la Box: {{ $box->name }}</h1>

    <form action="{{ route('box.update', $box->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ $box->name }}" required>
        </div>
        <div class="form-group">
            <label for="size">Taille (en m²)</label>
            <input type="number" name="size" class="form-control" value="{{ $box->size }}" required>
        </div>
        <div class="form-group">
            <label for="price">Prix (€)</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $box->price }}" required>
        </div>
        <div class="form-group">
            <label for="location">Emplacement</label>
            <input type="text" name="location" class="form-control" value="{{ $box->location }}" required>
        </div>
        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" class="form-control">
                <option value="disponible" {{ $box->status == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="occupé" {{ $box->status == 'occupé' ? 'selected' : '' }}>Occupé</option>
                <option value="réservé" {{ $box->status == 'réservé' ? 'selected' : '' }}>Réservé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Sauvegarder</button>
        <a href="{{ route('box.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
