<?php

namespace App\Http\Controllers;

use App\Models\ContractTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractTemplateController extends Controller
{

    public function index()
    {
        // Affiche uniquement les modèles de contrat associés à l'utilisateur connecté
        $templates = ContractTemplate::where('user_id', Auth::id())->get();
        return view('contract_templates.index', compact('templates'));
    }

    public function show($id)
    {
        // Utilise findOrFail pour récupérer le modèle par son ID
        $contractTemplate = ContractTemplate::findOrFail($id);
        return view('contract_templates.show', compact('contractTemplate'));
    }
    
    public function create()
    {
        return view('contract_templates.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|json',
        ]);
        // Crée un modèle de contrat lié à l'utilisateur connecté
        ContractTemplate::create([
            'name' => $request->name,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('contract_templates.index')->with('success', 'Modèle créé avec succès.');
    }

    public function edit($id)
    {
        // Supprimer l'appel à authorize() si tu ne veux pas gérer l'autorisation ici
        return view('contract_templates.edit', [
            "contractTemplate" => ContractTemplate::findOrFail($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        // Valide les données avant de les mettre à jour
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|json',
        ]);
    
        $contractTemplate = ContractTemplate::findOrFail($id);
        $contractTemplate->update([
            'name' => $request->name,
            'content' => $request->content,
        ]);
        return redirect()->route('contract_templates.index')->with('success', 'Modèle mis à jour.');
    }
    
    public function destroy($id)
    {
        ContractTemplate::destroy($id);
        return redirect()->route('contract_templates.index');
    }

}
// public function index()
// {
//     // Affiche uniquement les modèles de contrat associés à l'utilisateur connecté
//     $templates = ContractTemplate::where('user_id', Auth::id())->get();
//     return view('contract_templates.index', compact('templates'));
// }

// public function show(ContractTemplate $contractTemplate)
// {
//     // Supprimer la ligne d'autorisation si tu ne veux pas l'utiliser
//     return view('contract_templates.show', compact('contractTemplate'));
// }

// public function create()
// {
//     return view('contract_templates.create');
// }

// public function store(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'content' => 'required|json',
//     ]);

//     // Crée un modèle de contrat lié à l'utilisateur connecté
//     ContractTemplate::create([
//         'name' => $request->name,
//         'content' => $request->content,
//         'user_id' => Auth::id(),
//     ]);

//     return redirect()->route('contract_templates.index')->with('success', 'Modèle créé avec succès.');
// }

// public function edit(ContractTemplate $contractTemplate)
// {
//     // dd($contractTemplate); // Vérifie si Laravel reçoit bien l'objet
//     return view('contract_templates.edit', compact('contractTemplate'));
// }

// public function update(Request $request, ContractTemplate $contractTemplate)
// {
//     // Supprimer l'appel à authorize() si tu ne veux pas gérer l'autorisation ici

//     $request->validate([
//         'name' => 'required|string|max:255',
//         'content' => 'required|json',
//     ]);

//     $contractTemplate->update([
//         'name' => $request->name,
//         'content' => $request->content,
//     ]);

//     return redirect()->route('contract_templates.index')->with('success', 'Modèle mis à jour.');
// }


// public function destroy(ContractTemplate $contractTemplate)
// {
//     // Supprimer l'appel à authorize() si tu ne veux pas gérer l'autorisation ici
//     $contractTemplate->delete();
//     return redirect()->route('contract_templates.index')->with('success', 'Modèle supprimé.');
// }

