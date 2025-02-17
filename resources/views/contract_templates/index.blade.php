@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modèles de contrats</h1>
    <a href="{{ route('contract_templates.create') }}" class="btn btn-primary mb-3">Créer un modèle</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($templates as $template)
                <tr>
                    <td>{{ $template->name }}</td>
                    <td>{{ $template->content }}</td>
                    <td>
                        <a href="{{ route('contract_templates.edit', $template) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('contract_templates.show', $template) }}" class="btn btn-warning">voir</a>

                        <form action="{{ route('contract_templates.destroy', $template->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
