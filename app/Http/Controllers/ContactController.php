<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * POST: /contacto
     *
     * Guarda el mensaje de contacto en la base de datos.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|string|email|max:255',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
        ]);

        ContactMessage::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return back()->with('success', '¡Tu consulta ha sido enviada con éxito! Nos comunicaremos a la brevedad.');
    }

    /**
     * GET: /admin/messages
     *
     * Lista todos los mensajes de contacto en el panel de administrador.
     */
    public function index()
    {
        if (Auth::user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }

        $messages = ContactMessage::orderBy('created_at', 'desc')->get();

        return view('auth.admin.messages', compact('messages'));
    }

    /**
     * POST: /admin/messages/{message}/read
     *
     * Marca un mensaje como leído.
     */
    public function markAsRead(ContactMessage $message)
    {
        if (Auth::user()->rol_id != 1) {
            abort(403, 'No autorizado');
        }

        $message->update(['is_read' => true]);

        return redirect()->route('admin.messages.index')
            ->with('success', 'Mensaje marcado como leído.');
    }
}
