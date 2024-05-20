<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawais.index', compact('pegawais'));
    }

    public function create()
    {
        return view('pegawais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'jabatan' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        $pegawai = new Pegawai;
        $pegawai->nama_pegawai = $request->input('nama_pegawai');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->jenis_kelamin = $request->input('jenis_kelamin');
        $pegawai->jabatan = $request->input('jabatan');
        $pegawai->status = $request->input('status');
        $pegawai->save();

        return redirect('/pegawais')->with('success', 'Pegawai created successfully.');
    }

    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id); // Ubah dari find ke findOrFail
        return view('pegawais.show', compact('pegawai'));
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id); // Ubah dari find ke findOrFail
        return view('pegawais.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'jabatan' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        $pegawai = Pegawai::findOrFail($id); // Ubah dari find ke findOrFail
        $pegawai->nama_pegawai = $request->input('nama_pegawai');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->jenis_kelamin = $request->input('jenis_kelamin');
        $pegawai->jabatan = $request->input('jabatan');
        $pegawai->status = $request->input('status');
        $pegawai->save();

        return redirect('/pegawais')->with('success', 'Pegawai updated successfully.');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id); // Ubah dari find ke findOrFail
        $pegawai->delete();

        return redirect('/pegawais')->with('success', 'Pegawai deleted successfully.');
    }
}

