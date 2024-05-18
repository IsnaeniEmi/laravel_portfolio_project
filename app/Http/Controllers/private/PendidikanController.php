<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\PendidikanModel;
use App\Models\FooterModel;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function __construct(PendidikanModel $pendidikan)
    {
        $this->pendidikan = $pendidikan;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_institusi' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'angkatan' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->pendidikan->saveData($request->all());

        return redirect()->route('admin_profile')->with('success', 'Data pendidikan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $footer = FooterModel::first();
        $pendidikan = $this->pendidikan->getById($id);

        return view('pages.private.update_pendidikan', compact('pendidikan', 'footer'));
    }

     public function update(Request $request, $id)
    {
        $request->validate([
            'nama_institusi' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'angkatan' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->pendidikan->updateData($id, $request->all());

        return redirect()->route('admin_profile')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->pendidikan->deleteData($id);

        return redirect()->route('admin_profile');
    }
}
