@extends('layouts.app')

@section('content')
    <h1>Contrat entre {{ $contract->tenant->name }} et {{ $contract->box->name }}</h1>
    <p>Début : {{ $contract->start_date }}</p>
    <p>Fin : {{ $contract->end_date ?? 'En cours' }}</p>
    <a href="{{ route('contract.index') }}">Retour</a>
@endsection
