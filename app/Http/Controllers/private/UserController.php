<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\FooterModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    public function index()
    {
        $user = User::first();
        $footer = FooterModel::first();

        return view('pages.private.user', compact('user', 'footer'));
    }

    public function edit($id)
    {
        $user = User::first();
        $footer = FooterModel::first();
        $user = $this->user->getById($id);

        return view('pages.private.update_user', compact('user', 'user', 'footer'));
    }

    public function update($id)
    {
        $this->user->UpdateData($id, $this->request->all());

        return redirect()->route('admin_user');
    }

    public function destroy($id)
    {
        $this->user->deleteData($id);

        return redirect()->route('admin_user');
    }
}
