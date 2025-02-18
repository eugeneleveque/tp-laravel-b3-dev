<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractTemplate;
use App\Models\Box;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;


class ContractController extends Controller
{
    public function index()
    {
        // Récupérer tous les contrats
        $contracts = Contract::all();

        return view('contract.index', compact('contracts'));
    }

    // public function show($id)   
    // {
    //     // Récupérer le contrat
    //     $contract = Contract::findOrFail($id);

    //     return view('contract.show', compact('contract'));
    // }

    public function create()
    {
        $boxes = Box::all();
        $tenants = Tenant::all();
        $contractTemplates = ContractTemplate::all();
        return view('contract.create', compact('boxes', 'tenants', 'contractTemplates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
            'contract_template_id' => 'required|exists:contract_templates,id',
            'monthly_price' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Créer un contrat
        Contract::create([
            'box_id' => $request->box_id,
            'tenant_id' => $request->tenant_id,
            'user_id' => Auth::id(),
            'contract_template_id' => $request->contract_template_id,
            'monthly_price' => $request->monthly_price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('contract.index')->with('success', 'Contrat créé avec succès.');
    }

    public function edit($id)
    {
        // Récupérer le contrat
        $contract = Contract::findOrFail($id);
        
        $boxes = Box::all();
        $tenants = Tenant::all();

        return view('contract.edit', compact('contract', 'boxes', 'tenants'));
    }

    public function update(Request $request, $id)
    {
        // Récupérer le contrat
        $contract = Contract::findOrFail($id);

        // Mettre à jour le contrat
        $contract->update([
            'box_id' => $request->box_id,
            'tenant_id' => $request->tenant_id,
            'monthly_price' => $request->monthly_price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('contract.index')->with('success', 'Contrat mis à jour.');
    }

    public function destroy($id)
    {
        // Récupérer le contrat
        $contract = Contract::findOrFail($id);

        // Supprimer le contrat
        $contract->delete();

        return redirect()->route('contract.index')->with('success', 'Contrat supprimé.');
    }

    public function show($id)
    {
        // Récupérer le contrat
        $contract = Contract::findOrFail($id);
    
        // Récupérer le modèle de contrat et son contenu
        $contractTemplate = $contract->contractTemplate;
        $contractContent = json_decode($contractTemplate->content, true); // Décoder le JSON
    
        // Récupérer le locataire et le propriétaire
        $tenant = $contract->tenant;
        $landlord = Auth::user(); // Le propriétaire est l'utilisateur connecté
    
        // Remplacer les placeholders dans le modèle de contrat
        $contractText = $this->replaceContractVariables($contract, $contractContent['blocks'], $tenant, $landlord);
    
        // Passer les données à la vue
        return view('contract.show', compact('contract', 'contractText'));
    }
    

    
    private function replaceContractVariables($contract, $blocks, $tenant, $landlord)
    {
        foreach ($blocks as &$block) {
            if (isset($block['data']['text'])) {
                $text = $block['data']['text'];

                // Remplacer les placeholders par les données réelles
                $text = str_replace('%name%', $tenant->name, $text);
                $text = str_replace('%address%', $tenant->address, $text);
                $text = str_replace('%landlord%', $landlord->name, $text);
                $text = str_replace('%price%', number_format($contract->monthly_price, 2), $text);
                $startDate = Carbon::parse($contract->start_date)->format('d/m/Y');
                $endDate = Carbon::parse($contract->end_date)->format('d/m/Y');

                $block['data']['text'] = $text;

            }
        }

        // Construire le texte final du contrat
        $contractText = '';
        foreach ($blocks as $block) {
            if ($block['type'] == 'paragraph') {
                $contractText .= '<p>' . $block['data']['text'] . '</p>';
            }
        }

        return $contractText;
    }

    public function generatePdf($id)
{
    // Récupérer le contrat
    $contract = Contract::findOrFail($id);
    
    // Récupérer le modèle de contrat et son contenu
    $contractTemplate = $contract->contractTemplate;
    $contractContent = json_decode($contractTemplate->content, true); // Décoder le JSON
    
    // Récupérer le locataire et le propriétaire
    $tenant = $contract->tenant;
    $landlord = Auth::user(); // Le propriétaire est l'utilisateur connecté
    
    // Remplacer les placeholders dans le modèle de contrat
    $contractText = $this->replaceContractVariables($contract, $contractContent['blocks'], $tenant, $landlord);

    // Générer le PDF
    $pdf = PDF::loadView('contract.pdf', compact('contract', 'contractText'));

    // Retourner le PDF en téléchargement
    return $pdf->download('contrat_' . $contract->id . '.pdf');
}

}
