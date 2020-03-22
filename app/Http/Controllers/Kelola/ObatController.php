<?php

namespace App\Http\Controllers;

use App\Obat;
use App\MyOwnClass\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    public function index()
    {
        return view('kelola.obat.index', [
            'obats' => Obat::all()
        ]);
    }

    public function create()
    {
        return view('kelola.obat.create', []);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return Flash::error(url("kelola/obat"), 'Masukkan tidak sesuai');
        }

        $obat = Obat::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return Flash::success(url("kelola/obat"), 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        return view('kelola.obat.show', [
            'obat' => Obat::find($id) ?? abort(404)
        ]);
    }

    public function edit($id)
    {
        return view('kelola.obat.edit', [
            'obat' => Obat::find($id) ?? abort(404)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return Flash::error(url("kelola/obat"), 'Masukkan tidak sesuai');
        }

        $obat = Obat::find($id);

        if (empty($obat)) {
            return Flash::error(url("kelola/obat"), 'Data obat tidak ditemukan');
        }

        $obat->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);
        
        return Flash::success(url("kelola/obat"), 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Obat::destroy($id);
        return Flash::success(url("kelola/obat"), 'Data berhasil dihapus');
    }
}