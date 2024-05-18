<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Models\PendidikanModel;
use App\Models\PengalamanModel;
use App\Models\FooterModel;
use App\Models\User;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct(PendidikanModel $pendidikan, PengalamanModel $pengalaman)
    {
        $this->pendidikan = $pendidikan;
        $this->pengalaman = $pengalaman;
    }

    public function index()
    {
        $pendidikan = $this->pendidikan->getWithPaginate();
        $pengalaman = $this->pengalaman->getWithPaginate();
        $footer = FooterModel::first();

        return view('pages.public.profile', compact('pendidikan', 'pengalaman', 'footer'));
    }

    public function indexPaginate()
    {
        $user = User::first();
        $footer = FooterModel::first();
        $pendidikan = $this->pendidikan->getWithPaginate();
        $pengalaman = $this->pengalaman->getWithPaginate();

        return view('pages.private.profile', compact('pendidikan', 'pengalaman', 'user', 'footer'));
    }
}
