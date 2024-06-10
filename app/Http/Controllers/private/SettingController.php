<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\HomeModel;
use App\Models\FooterModel;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(HomeModel $home, FooterModel $footer)
    {
        $this->home = $home;
        $this->footer = $footer;
    }

    public function index()
    {
        $home = HomeModel::first();
        $footer = FooterModel::first();

        return view('pages.private.setting', compact('home', 'footer'));
    }

    public function storeHome(Request $request)
    {
        $request->validate([
            'judul_besar' => 'required|string|max:255',
            'deskripsi_judul' => 'required|string|max:255',
            'deskripsi_about' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->home->saveData($request->all());

        return redirect()->route('admin_setting')->with('success', 'Data berhasil ditambahkan.');;
    }

    public function updateHome(Request $request, $id)
    {
        $request->validate([
            'judul_besar' => 'required|string|max:255',
            'deskripsi_judul' => 'required|string|max:255',
            'deskripsi_about' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->home->UpdateData($id, $request->all());

        return redirect()->route('admin_setting')->with('success', 'Data berhasil Diubah.');;
    }

    public function destroyHome($id)
    {
        $this->home->deleteData($id);

        return redirect()->route('admin_setting');
    }

    public function storeFooter()
    {
        $this->footer->saveData($this->request->all());

        return redirect()->route('admin_setting');
    }

    public function updateFooter($id)
    {
        $this->footer->UpdateData($id, $this->request->all());

        return redirect()->route('admin_setting');
    }

    public function destroyFooter($id)
    {
        $this->footer->deleteData($id);

        return redirect()->route('admin_setting');
    }
}
