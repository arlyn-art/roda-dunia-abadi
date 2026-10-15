<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function index()
    {
        $title = "Partners";
        $partnerSettings = Settings::where('group', 'partners')->get()->keyBy('name');
        $meta = $partnerSettings['Meta']->payload ?? [];
        $hero = $partnerSettings['Hero']->payload ?? [];
        $heroMedia = $hero['hero_media'] ?? null;

        $partners = [
            ['name' => 'Adhi', 'image' => 'img/trusted/trusted-1.png'],
            ['name' => 'Total Bangun Persada', 'image' => 'img/trusted/trusted-2.png'],
            ['name' => 'Waskita', 'image' => 'img/trusted/trusted-3.png'],
            ['name' => 'Rekind', 'image' => 'img/trusted/trusted-4.png'],
            ['name' => 'Wika', 'image' => 'img/trusted/trusted-5.png'],
            ['name' => 'Adhi', 'image' => 'img/trusted/trusted-1.png'],
            ['name' => 'Total Bangun Persada', 'image' => 'img/trusted/trusted-2.png'],
            ['name' => 'Waskita', 'image' => 'img/trusted/trusted-3.png'],
            ['name' => 'Rekind', 'image' => 'img/trusted/trusted-4.png'],
            ['name' => 'Wika', 'image' => 'img/trusted/trusted-5.png'],
        ];

        return view('partners', compact('partners', 'title', 'meta', 'heroMedia'));
    }
}