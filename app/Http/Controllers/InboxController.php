<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Inbox $inbox)
    {
        $inbox = Inbox::latest()->paginate(10);

        return view('inboxdir.index', compact('inbox'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inboxdir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        Inbox::create($validate);

        return redirect()->route('admin-inbox.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inbox $inbox)
    {
        //
    }

    /**
     * Store contact form from public website.
     */
    public function storepublic(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'program' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        // CAPTCHA DISABLED SEMENTARA

        // Simpan pesan ke database
        Inbox::create($validate);

        return redirect('/')
            ->with('contact_success', 'Pesan berhasil dikirim!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inbox $inbox)
    {
        return view('inboxdir.edit', compact('inbox'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inbox $inbox)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'program' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        $inbox->update($validated);

        return redirect()->route('admin-inbox.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inbox $inbox)
    {
        $inbox->delete();

        return redirect()->route('admin-inbox.index');
    }
}
