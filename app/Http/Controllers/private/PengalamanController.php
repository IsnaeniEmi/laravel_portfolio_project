<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\PengalamanModel;
use App\Models\FooterModel;
use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    public function __construct(PengalamanModel $pengalaman)
    {
        $this->pengalaman = $pengalaman;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pt' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'mulai' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->pengalaman->saveData($request->all());

        return redirect()->route('admin_profile')->with('success', 'Data pengalaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $footer = FooterModel::first();
        $pengalaman = $this->pengalaman->getById($id);

        return view('pages.private.update_pengalaman', compact('pengalaman', 'footer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pt' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'mulai' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->pengalaman->updateData($id, $request->all());

        return redirect()->route('admin_profile')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->pengalaman->deleteData($id);

        return redirect()->route('admin_profile');
    }
}
