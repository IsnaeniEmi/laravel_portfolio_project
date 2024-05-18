<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterModel;

class LoginController extends Controller
{
    public function index()
    {
        $footer = FooterModel::first();

        return view('auth.public.login', compact('footer'));
    }
}
