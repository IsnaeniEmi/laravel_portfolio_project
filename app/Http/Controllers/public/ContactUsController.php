<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUsModel;
use App\Models\FooterModel;
use App\Models\User;

class ContactUsController extends Controller
{
    public function __construct(ContactUsModel $contact, Request $request)
    {
        $this->contact = $contact;
        $this->request = $request;
    }

    public function index()
    {
        $user = User::first();
        $footer = FooterModel::first();

        return view('pages.public.contact_us', compact('user','footer'));
    }

    public function indexPaginate()
    {
        $user = User::first();
        $footer = FooterModel::first();
        $contact = $this->contact->getWithPaginate();

        return view('pages.private.contact_response', compact('contact', 'user', 'footer'));
    }

    public function store()
    {
        $this->contact->saveData($this->request->all());

        return redirect()->route('contact')->with('success', 'Pesan Berhasil Dikirim.');;
    }

    public function show($id)
    {
        $user = User::first();
        $footer = FooterModel::first();
        $contact = $this->contact->getById($id);

        return view('pages.private.show_response', compact('contact', 'user', 'footer'));
    }

    public function destroy($id)
    {
        $this->contact->deleteData($id);

        return redirect()->route('contact_response');
    }
}
