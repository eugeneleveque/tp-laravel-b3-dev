@extends('layouts.app')

@section('content')
    <h1>Modifier un Contrat</h1>
    <form action="{{ route('contract.update', $contract->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Box :</label>
        <select name="box_id">
            @foreach($boxes as $box)
                <option value="{{ $box->id }}" {{ $contract->box_id == $box->id ? 'selected' : '' }}>{{ $box->name }}</option>
            @endforeach
        </select>

        <label>Locataire :</label>
        <select name="tenant_id">
            @foreach($tenants as $tenant)
                <option value="{{ $tenant->id }}" {{ $contract->tenant_id == $tenant->id ? 'selected' : '' }}>{{ $tenant->name }}</option>
            @endforeach
        </select>

        <label>Date de début :</label>
        <input type="date" name="start_date" value="{{ $contract->start_date }}" required>

        <label>Date de fin :</label>
        <input type="date" name="end_date" value="{{ $contract->end_date }}">

        <button type="submit">Modifier</button>
    </form>
@endsection
