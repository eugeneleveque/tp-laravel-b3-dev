@extends('layouts.app')

@section('content')
    <h1>Ajouter un Locataire</h1>
    <form action="{{ route('tenant.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nom" required>
        <input type="text" name="phone" placeholder="Téléphone" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="address" placeholder="Adresse" required>
        <input type="text" name="bank_account" placeholder="Compte Bancaire" required>
        <button type="submit">Créer</button>
    </form>
@endsection