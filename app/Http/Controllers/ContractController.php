<?php
namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Box;
use App\Models\Tenant;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        return view('contract.index', [
            "contracts" => Contract::with(['box', 'tenant'])->get()
        ]);
    }

    public function show($id)
    {
        return view('contract.show', [
            "contract" => Contract::with(['box', 'tenant'])->findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('contract.create', [
            "boxes" => Box::all(),
            "tenants" => Tenant::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
    
        // Vérifier si le box est déjà loué à cette période
        $exists = Contract::where('box_id', $request->box_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('start_date', '<=', $request->start_date)
                              ->where('end_date', '>=', $request->end_date);
                    });
            })
            ->exists();
    
        if ($exists) {
            return back()->withErrors(['box_id' => 'Ce box est déjà loué sur cette période.']);
        }
    
        // Création du contrat
        Contract::create($request->all());
    
        return redirect()->route('contract.index');
    }

    public function edit($id)
    {
        return view('contract.edit', [
            "contract" => Contract::findOrFail($id),
            "boxes" => Box::all(),
            "tenants" => Tenant::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $contract = Contract::findOrFail($id);

        $request->validate([
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $contract->update($request->all());

        return redirect()->route('contract.index');
    }

    public function destroy($id)
    {
        Contract::destroy($id);
        return redirect()->route('contract.index');
    }
}
