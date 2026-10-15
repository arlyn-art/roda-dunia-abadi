<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Mail\ContactFormMail;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function index()
    {
        $title = "Contact Us";
        $contactSettings = Settings::where('group', 'contact')->get()->keyBy('name');
        $meta = $contactSettings['Meta']->payload ?? [];
        $hero = $contactSettings['Hero']->payload ?? [];
        $heroMedia = $hero['hero_media'] ?? null;
        return view('contact', compact('title', 'meta', 'heroMedia'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'                 => 'required|string|max:255',
            'email'                => 'required|email|max:255',
            'phone'                => 'nullable|string|max:50',
            'company'              => 'nullable|string|max:255',
            'message'              => 'required|string',
            'g-recaptcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$response->json('success')) {
            return back()->withErrors(['g-recaptcha-response' => 'Validasi reCAPTCHA gagal. Silakan centang kotak verifikasi.'])->withInput();
        }

        ContactMessage::create($validated);
        $recipient = env('MAIL_TO_ADDRESS', 'arlyn@designcub3.com');
        Mail::to($recipient)->send(new ContactFormMail($validated));

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}
