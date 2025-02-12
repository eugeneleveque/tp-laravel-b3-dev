<!-- resources/views/box/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle Box</h1>

    <form action="{{ route('box.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="size">Taille (en m²)</label>
            <input type="number" name="size" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Prix (€)</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location">Emplacement</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" class="form-control">
                <option value="disponible">Disponible</option>
                <option value="occupé">Occupé</option>
                <option value="réservé">Réservé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('box.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
