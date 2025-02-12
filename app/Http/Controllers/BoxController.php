<?php

namespace App\Http\Controllers;
use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        return view('box.index', [
            "boxes" => Box::all()
        ]);
    }

    public function show($id)
    {
        return view('box.show', [
            "box" => Box::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('box.create');
    }

    public function store(Request $request)
    {
        $box = new Box();
        $box->name = $request->get('name');
        $box->size = $request->get('size');
        $box->price = $request->get('price');
        $box->location = $request->get('location');
        $box->status = $request->get('status');
        $box->user_id = auth()->user()->id;  // Assure-toi que l'utilisateur est connecté

        $box->save();

        return redirect()->route('box.index');
    }

    public function edit($id)
    {
        return view('box.edit', [
            "box" => Box::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $box = Box::findOrFail($id);
        $box->name = $request->get('name');
        $box->size = $request->get('size');
        $box->price = $request->get('price');
        $box->location = $request->get('location');
        $box->status = $request->get('status');
        $box->save();

        return redirect()->route('box.index');
    }

    public function destroy(Request $request, $id)
    {
        Box::destroy($id);

        return redirect()->route('box.index');
    }


}
