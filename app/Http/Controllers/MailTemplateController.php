<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class MailTemplateController extends Controller
{
    public function index(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::find(Session::get('LoggedIn'));
            $mailTemplates = MailTemplate::all();

            return view('admin.mail-templates.index', compact('mailTemplates', 'user_session'));
        }

        return redirect('login'); // Redirect if not logged in
    }

    public function add(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::find(Session::get('LoggedIn'));
            return view('admin.mail-templates.add', compact('user_session'));
        }

        return redirect('login'); // Redirect if not logged in
    }

    public function save(Request $request)
{
    // Handle status checkbox
    $status = $request->has('status') ? 1 : 0; // 1 if checked, 0 if not

    try {


        // Create a new MailTemplate instance with all the input data
        $mailTemplate = MailTemplate::create([
            'alias' => $request->alias,
            'name' => $request->name,
            'subject' => $request->subject,
            'body' => $request->body,
            'status' => $status,
            'shortcodes' => $request->shortcodes,
        ]);

        return back()->with('success', 'Plantilla creada con éxito');
    } catch (\Exception $e) {
        // Log the exception message
        \Log::error('Error saving MailTemplate: ' . $e->getMessage());
        return back()->with('fail', 'Error al crear la plantilla: ' . $e->getMessage());
    }
}


    public function edit(Request $request, $id)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::find(Session::get('LoggedIn'));
            $mailTemplate = MailTemplate::findOrFail($id); // Find template or fail

            return view('admin.mail-templates.edit', compact('mailTemplate', 'user_session'));
        }

        return redirect('login'); // Redirect if not logged in
    }

    public function update(Request $request, $id)
    {
        // Validate the request input
        $request->validate([
            'alias' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required'],
            'status' => ['nullable', 'boolean'], // Validate status as boolean
            'shortcodes' => ['nullable', 'string'], // Validate shortcodes as a string
        ]);

        // Find the mail template by ID
        $mailTemplate = MailTemplate::findOrFail($id);

        // Update the template
        $mailTemplate->alias = $request->alias;
        $mailTemplate->name = $request->name;
        $mailTemplate->subject = $request->subject;
        $mailTemplate->body = $request->body;
        $mailTemplate->status = 1; // Check if status is set



        $mailTemplate->save();

        return back()->with('success', 'Plantilla actualizada con éxito');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        // Validate if the IDs are provided
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No IDs provided.']);
        }

        // Delete the templates
        MailTemplate::whereIn('id', $ids)->delete();

        return response()->json(['success' => true, 'message' => 'Plantillas eliminadas exitosamente.']);
    }
}
