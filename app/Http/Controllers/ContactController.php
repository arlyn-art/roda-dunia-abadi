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

        $globalSettings = Settings::where('group', 'global')->get()->keyBy('subgroup');

        $footerPayload = $globalSettings['footer']->payload ?? [];
        $defaultAddress = "Jl. Muara baru Komplek Pergudangan\nBlok A9-10 RT. 001 / 017,\nKel Penjaringan, Kec Penjaringan\nJakarta Utara 14440\nINDONESIA";
        $address = !empty($footerPayload['address']) ? $footerPayload['address'] : $defaultAddress;

        $contactPayload = $globalSettings['contact']->payload ?? [];
        $defaultMapUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0945763567493!2d106.7978189!3d-6.1158914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1f10bc132b49%3A0x6b198c2534a2e505!2sPT.%20Roda%20Dunia%20Abadi!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid";
        $mapsEmbedUrl = !empty($contactPayload['maps_embed_url']) ? $contactPayload['maps_embed_url'] : $defaultMapUrl;

        return view('contact', compact('title', 'meta', 'heroMedia', 'address', 'mapsEmbedUrl'));
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
