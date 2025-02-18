@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un Contrat</h1>

    <form action="{{ route('contract.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="box_id" class="form-label">Box</label>
            <select name="box_id" id="box_id" class="form-control" required>
                @foreach($boxes as $box)
                    <option value="{{ $box->id }}">{{ $box->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tenant_id" class="form-label">Locataire</label>
            <select name="tenant_id" id="tenant_id" class="form-control" required>
                @foreach($tenants as $tenant)
                    <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="contract_template_id" class="form-label">Modèle de contrat</label>
            <select name="contract_template_id" id="contract_template_id" class="form-control" required>
                @foreach($contractTemplates as $template)
                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="monthly_price" class="form-label">Prix mensuel</label>
            <input type="number" name="monthly_price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Date de fin</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer le contrat</button>
    </form>
</div>
@endsection
