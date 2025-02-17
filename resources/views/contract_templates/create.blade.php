@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un modèle</h1>
    <form action="{{ route('contract_templates.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom du modèle</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="editorjs" class="form-label">Contenu</label>
            <div id="editorjs"></div>
            <input type="hidden" name="content" id="content">
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script>
    const editor = new EditorJS({
        holder: 'editorjs',
        onChange: async () => {
            const content = await editor.save();
            document.getElementById('content').value = JSON.stringify(content);
        }
    });
</script>
@endsection
