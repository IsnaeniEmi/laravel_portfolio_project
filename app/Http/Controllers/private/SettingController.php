<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\HomeModel;
use App\Models\FooterModel;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(HomeModel $home, FooterModel $footer, Request $request)
    {
        $this->home = $home;
        $this->footer = $footer;
        $this->request = $request;
    }

    public function index()
    {
        $home = HomeModel::first();
        $footer = FooterModel::first();

        return view('pages.private.setting', compact('home', 'footer'));
    }

    public function storeHome()
    {
        $this->home->saveData($this->request->all());

        return redirect()->route('admin_setting');
    }

    public function updateHome($id)
    {
        $this->home->UpdateData($id, $this->request->all());

        return redirect()->route('admin_setting');
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
