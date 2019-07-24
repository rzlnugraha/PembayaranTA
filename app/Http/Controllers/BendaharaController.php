<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angkatan;

class BendaharaController extends Controller
{
    public function index()
    {
        $angkatan = Angkatan::all();
        return view('bendahara.index', compact('angkatan'));
    }

    public function create()
    {
        // return view('bendahara.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $angkatan = Angkatan::findOrFail($id);
        return view('bendahara.show', compact('angkatan'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
