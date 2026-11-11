<?php

namespace App\Http\Controllers;

use App\Models\Partners;
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

        $partners = Partners::where('is_active', true)
            ->latest()
            ->get();

        if ($partners->isEmpty()) {
            $partners = collect([
                (object) ['name' => 'Adhi', 'logo' => 'img/trusted/trusted-1.png', 'url' => '#'],
                (object) ['name' => 'Total Bangun Persada', 'logo' => 'img/trusted/trusted-2.png', 'url' => '#'],
                (object) ['name' => 'Waskita', 'logo' => 'img/trusted/trusted-3.png', 'url' => '#'],
                (object) ['name' => 'Rekind', 'logo' => 'img/trusted/trusted-4.png', 'url' => '#'],
                (object) ['name' => 'Wika', 'logo' => 'img/trusted/trusted-5.png', 'url' => '#'],
                (object) ['name' => 'Adhi', 'logo' => 'img/trusted/trusted-1.png', 'url' => '#'],
                (object) ['name' => 'Total Bangun Persada', 'logo' => 'img/trusted/trusted-2.png', 'url' => '#'],
                (object) ['name' => 'Waskita', 'logo' => 'img/trusted/trusted-3.png', 'url' => '#'],
                (object) ['name' => 'Rekind', 'logo' => 'img/trusted/trusted-4.png', 'url' => '#'],
                (object) ['name' => 'Wika', 'logo' => 'img/trusted/trusted-5.png', 'url' => '#'],
            ]);
        }

        return view('partners', compact('partners', 'title', 'meta', 'heroMedia'));
    }
}