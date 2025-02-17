@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $contractTemplate->name }}</h1>
    <p><strong>Créé par :</strong> {{ $contractTemplate->user->name ?? 'Inconnu' }}</p>
    
    <div id="editorjs"></div>

    <a href="{{ route('contract_templates.edit', $contractTemplate) }}" class="btn btn-primary">Modifier</a>

    <a href="{{ route('contract_templates.index') }}" class="btn btn-secondary">Retour</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editor = new EditorJS({
            holder: 'editorjs',
            readOnly: true,
            data: {!! $contractTemplate->content !!}
        });
    });
</script>
@endsection
