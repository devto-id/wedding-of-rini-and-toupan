<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisitorController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan daftar tamu undangan
        return view('admin.visitor.index', [
            'visitors' => Visitor::all(),
        ]);
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan tamu undangan baru
        return view('admin.visitor.form');
    }

    public function store(Request $request)
    {
        // Validasi data dari formulir
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buat atau update data tamu undangan
        Visitor::updateOrCreate(
            ['id' => $request->id], // Jika ID tersedia, itu akan dianggap sebagai pembaruan
            ['name' => $request->name, /* tambahkan field lainnya */]
        );

        // Redirect ke halaman daftar tamu undangan dengan pesan sukses
        return redirect()->route('admin.visitor.index')->with('success', 'Data tamu undangan berhasil disimpan.');
    }

    public function edit(Visitor $visitor)
    {
        // Menampilkan form untuk mengedit tamu undangan
        return view('admin.visitor.create', ['data' => $visitor]);
    }

    public function destroy(Visitor $visitor)
    {
        // Hapus tamu undangan
        $visitor->delete();

        // Redirect ke halaman daftar tamu undangan dengan pesan sukses
        return redirect()->route('admin.visitor.index')->with('success', 'Data tamu undangan berhasil dihapus.');
    }
}
