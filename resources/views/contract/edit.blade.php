@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Modifier le Contrat</h1>

    <form action="{{ route('contract.update', $contract->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="box_id" class="form-label">Box</label>
            <select name="box_id" id="box_id" class="form-control" required>
                @foreach($boxes as $box)
                    <option value="{{ $box->id }}" {{ $contract->box_id == $box->id ? 'selected' : '' }}>{{ $box->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tenant_id" class="form-label">Locataire</label>
            <select name="tenant_id" id="tenant_id" class="form-control" required>
                @foreach($tenants as $tenant)
                    <option value="{{ $tenant->id }}" {{ $contract->tenant_id == $tenant->id ? 'selected' : '' }}>{{ $tenant->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="monthly_price" class="form-label">Prix mensuel</label>
            <input type="number" name="monthly_price" class="form-control" value="{{ $contract->monthly_price }}" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début</label>
            <input type="date" name="start_date" class="form-control" value="{{ $contract->start_date }}" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Date de fin</label>
            <input type="date" name="end_date" class="form-control" value="{{ $contract->end_date }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form>
</div>
@endsection
