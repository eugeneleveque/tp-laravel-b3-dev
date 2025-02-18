<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Contract;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BillController extends Controller
{
    public function index()
    {

        $bills = Bill::all();  // Récupère toutes les factures

        return view('bill.index', compact('bills'));  // Passe les factures à la vue

    }

    public function show($id)
    {
        return view('bill.show', [
            "bill" => Bill::findOrFail($id)
        ]);
    }

    public function create($contractId)
    {
        $contract = Contract::findOrFail($contractId);
        return view('bill.create', compact('contract'));
    }

    public function store(Request $request)
    {
        // On récupère la date d'aujourd'hui
        $today = Carbon::today()->toDateString();

        // Récupérer les contrats en cours qui n'ont pas encore de facture
        $contracts = Contract::where('date_start', '<=', $today)
                            ->where('date_end', '>=', $today)
                            ->whereDoesntHave('bills')
                            ->get();

        // Créer une facture pour chaque contrat
        foreach ($contracts as $contract) {
            // Calculer le nombre de mois depuis le début du contrat
            $startDate = Carbon::parse($contract->date_start);
            $periodNumber = $startDate->diffInMonths($today) + 1;

            // Créer la facture
            $bill = new Bill();
            $bill->paiement_montant = $contract->monthly_price; // Utilisation du prix mensuel du contrat
            $bill->paiement_date = null; // Si non payé, mettre null
            $bill->periode_number = $periodNumber; // Période calculée
            $bill->contract_id = $contract->id; // Lien avec le contrat
            $bill->save();
        }

        return redirect()->route('bill.index')
            ->with('success', 'Les factures ont été générées avec succès.');
    }
    public function edit ($id)
    {
        $bill = Bill::find($id);
        return view('bill.edit', compact('bill'));
    }
    public function update (Request $request, $id)
    {
        $bill = Bill::find($id);
        $bill->paiement_montant = $request->input('paiement_montant');
        $bill->paiement_date = $request->input('paiement_date');
        $bill->save();
        return redirect()->route('bill.index')
            ->with('success', 'La facture a été modifiée avec succès.');
    }
}
