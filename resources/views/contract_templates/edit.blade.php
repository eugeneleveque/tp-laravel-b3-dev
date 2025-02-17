@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le modèle</h1>
    <form action="{{ route('contract_templates.update', $contractTemplate->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom du modèle</label>
            <input type="text" name="name" class="form-control" value="{{ $contractTemplate->name }}" required>
        </div>

        <div class="mb-3">
            <label for="editorjs" class="form-label">Contenu</label>
            <div id="editorjs"></div>
            <input type="hidden" name="content" id="content">
        </div>
        <a href="{{ route('contract_templates.index') }}" class="btn btn-secondary">Retour</a>


        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script>
    const editor = new EditorJS({
        holder: 'editorjs',
        data: {!! json_encode(json_decode($contractTemplate->content)) !!},  // Assure-toi que le contenu est bien décodé ici
        onChange: async () => {
            const content = await editor.save();
            document.getElementById('content').value = JSON.stringify(content);
        }
    });
</script>
@endsection
