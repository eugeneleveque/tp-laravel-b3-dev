@extends('layouts.app')

@section('content')
    <h1>Modifier Locataire</h1>
    <form action="{{ route('tenant.update', $tenant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $tenant->name }}" required>
        <input type="text" name="phone" value="{{ $tenant->phone }}" required>
        <input type="email" name="email" value="{{ $tenant->email }}" required>
        <input type="text" name="address" value="{{ $tenant->address }}" required>
        <input type="text" name="bank_account" value="{{ $tenant->bank_account }}" required>
        <button type="submit">Modifier</button>
    </form>
@endsection