<?php

namespace App\Http\Controllers;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{

    public function index()
    {
        return view('tenant.index', [
            "tenants" => Tenant::all()
        ]);
    }

    public function show($id)
    {
        return view('tenant.show', [
            "tenant" => Tenant::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('tenant.create');
    }

    public function store(Request $request)
    {
        $tenant = new Tenant();
        $tenant->name = $request->get('name');
        $tenant->phone = $request->get('phone');
        $tenant->email = $request->get('email');
        $tenant->address = $request->get('address');
        $tenant->bank_account = $request->get('bank_account');
        $tenant->save();

        return redirect()->route('tenant.index');
    }

    public function edit($id)
    {
        return view('tenant.edit', [
            "tenant" => Tenant::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->name = $request->get('name');
        $tenant->phone = $request->get('phone');
        $tenant->email = $request->get('email');
        $tenant->address = $request->get('address');
        $tenant->bank_account = $request->get('bank_account');
        $tenant->save();

        return redirect()->route('tenant.index');
    }

    public function destroy($id)
    {
        Tenant::destroy($id);

        return redirect()->route('tenant.index');
    }
}
