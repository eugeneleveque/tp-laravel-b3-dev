@extends('layouts.app')

@section('content')
    <h1>Créer un Contrat</h1>
    <form action="{{ route('contract.store') }}" method="POST">
        @csrf
        <label>Box :</label>
        <select name="box_id">
            @foreach($boxes as $box)
                <option value="{{ $box->id }}">{{ $box->name }}</option>
            @endforeach
        </select>

        <label>Locataire :</label>
        <select name="tenant_id">
            @foreach($tenants as $tenant)
                <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
            @endforeach
        </select>

        <label>Date de début :</label>
        <input type="date" name="start_date" required>

        <label>Date de fin :</label>
        <input type="date" name="end_date">

        <button type="submit">Créer</button>
    </form>
@endsection
